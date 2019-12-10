<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\Kas;
use Carbon\Carbon;
use DB;
use Alert;
use PDF;
use Excel;
class KasKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
      if ($request->ajax()) {
        // $tahun = $request->get('tgl_kas_keluar');
        // $bulan = $request->get('created_at');
        
        $kaskeluar = DB::table('kass')->where('jenis','keluar')->get();
        return Datatables::of($kaskeluar)
        ->addColumn('action', function($kaskeluar){
          $action = '<a href="'. route('kaskeluar.edit', base64_encode($kaskeluar->id)) .'" data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-xs btn-primary btn-round"><i class="fa fa-edit" aria-hidden="true"></i> </a>&nbsp;';
          $action .= '<div class="pull-right" style="margin-right: 20%">';
          $action .= \Form::open(['url'=> route('kaskeluar.destroy', $kaskeluar->id),'method'=>'delete', 'id' => 'form_id']);
          $action .= "<button type='submit' class='btn btn-xs btn-danger btn-round'><i class='fas fa-trash-alt'></i> </button>";
          $action .= \Form::close();
          $action .= '</div>';
          return $action;
        })
        ->editColumn('tgl', function($tgl){
           return date('d F Y', strtotime($tgl->tgl));
        })
        ->editColumn('jumlah', function($jumlah){
          return 'Rp.' . number_format($jumlah->jumlah);
        })
        ->make(true);
      }

    }
    public function index()
    {
       $kaskeluar = Kas::all()->where('jenis','keluar');
       return view('kaskeluar.index', compact('kaskeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'tgl' => 'required',
          'keterangan'=> 'required',
          'jumlah'=>'required'
        ]);

        $kaskeluar = new Kas;
        $kaskeluar->tgl = $request->tgl;
        $kaskeluar->nama = '-';
        $kaskeluar->keterangan = $request->keterangan;
        $kaskeluar->jumlah = $request->jumlah;
        $kaskeluar->jenis  = 'keluar';
        $kaskeluar->masuk  = '0';
        $kaskeluar->keluar = $request->jumlah;
        $kaskeluar->save();

        alert()->success('Menambahkan Kas Keluar','Berhasil')->persistent('Close');
        return redirect()->route('kaskeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kaskeluar = Kas::find(base64_decode($id));
        return view('kaskeluar.edit', compact('kaskeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'tgl' => 'required',
          'keterangan'=> 'required',
          'jumlah'=>'required'
        ]);
        $kaskeluar = Kas::find($id);
        $kaskeluar->tgl = $request->tgl;
        $kaskeluar->keterangan = $request->keterangan;
        $kaskeluar->jumlah = $request->jumlah;
        $kaskeluar->save();


        Alert()->success('Mengupdate Kas keluar', 'Berhasil')->persistent('close');
        return redirect()->route('kaskeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kaskeluar = Kas::find($id);
        $kaskeluar->delete();
        alert()->success('Menghapus Kas Keluar', 'Berhasil')->persistent('close');
        return redirect()->route('kaskeluar.index');
    }

    public function exportpdfkel()
    {
      $kaskeluar = Kas::all()->where('jenis','keluar');
      $pdf = PDF::loadview('kaskeluar.exportpdfkel.jumlahpengeluaran',['kaskeluar'=>$kaskeluar]);
      return $pdf->setPaper('a4')->download("jumlahpengeluaran.pdf");
    }

    public function exportpdfperiodekel(Request $request)
    {   
      $from = $request->get('tgl');
      $to   = $request->get('created_at');
      $kaskeluar = Kas::whereBetween('tgl',[$from, $to])->where('jenis','keluar')->get();                     
      $pdf = PDF::loadview('kaskeluar.exportpdfkel.jumlahpengeluaranper',['kaskeluar'=>$kaskeluar, 'from' => $from, 'to' => $to]);
      return $pdf->setPaper('a4')->download("jumlahpengeluaranper.pdf");            

    }

    public function exportExcelkel()
    {
      $kaskeluar = Kas::all()->where('jenis','keluar');
      \Excel::create('Laporan Kas keluar', function($excel) use ($kaskeluar){
        $excel->setTitle('Laporan Kas keluar');
        $excel->sheet('Data Pemasukan', function($sheet) use ($kaskeluar){
          $row = 1;
          $sheet->row($row, [
            'Tanggal',
            'Keterangan',
            'Jumlah'
          ]);
          foreach ($kaskeluar as $item) {
            $sheet->row(++$row, [
            date('d F Y', strtotime($item->tgl)),
             $item->keterangan,
             'Rp.' . number_format($item->jumlah)
           ]);
          }
        });
      })->export('xls');
    }
    public function exportexcelperkel(Request $request)
    {
      $from = $request->get('tgl');
      $to   = $request->get('created_at');
      $kaskeluar = Kas::whereBetween('tgl',[$from, $to])->where('jenis','keluar')->get();
      \Excel::create('Laporan Kas keluar Per Periode', function($excel) use ($kaskeluar){
        $excel->setTitle('Laporan Kas keluar Periode');
        $excel->sheet('Data Pengeluaran Per Periode', function($sheet) use ($kaskeluar){
          $row = 1;
          $sheet->row($row, [
            'Tanggal',
            'Keterangan',
            'Jumlah'
          ]);
          foreach ($kaskeluar as $item) {
            $sheet->row(++$row, [
              date('d F Y', strtotime($item->tgl)),
             $item->keterangan,
             'Rp.' . number_format($item->jumlah)
           ]);
          }
        });
      })->export('xls'); 
    }
}

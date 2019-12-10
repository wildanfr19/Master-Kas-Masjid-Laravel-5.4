<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Kas;
use Carbon\Carbon;
use DB;
use Alert;
use PDF;
use Excel;
class KasMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
      if ($request->ajax()) {
        // $tahun = $request->get('tgl_kas_masuk');
        // $bulan = $request->get('created_at');

        $kasmasuk = DB::table('kass')->where('jenis','masuk')->get();

        return Datatables::of($kasmasuk)
        ->addColumn('action', function($kasmasuk){
          $action = '<a href="'. route('kasmasuk.edit', base64_encode($kasmasuk->id)) .'" data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-xs btn-primary btn-round"><i class="fa fa-edit" aria-hidden="true"></i> </a>&nbsp;';
          $action .= '<div class="pull-right" style="margin-right: 20%">';
          $action .= \Form::open(['url'=> route('kasmasuk.destroy', $kasmasuk->id),'method'=>'delete', 'id' => 'form_id']);
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
       $kasmasuk = Kas::all()->where('jenis','masuk');
       return view('kasmasuk.index', compact('kasmasuk', 'totalmasuk'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
        'nama'=> 'required',
        'keterangan'=> 'required',
        'jumlah'=>'required'
      ]);

      $kasmasuk = new Kas;
      $kasmasuk->tgl = $request->tgl;
      $kasmasuk->nama = $request->nama;
      $kasmasuk->keterangan = $request->keterangan;
      $kasmasuk->jumlah = $request->jumlah;
      $kasmasuk->jenis  = 'masuk';
      $kasmasuk->masuk  = $request->jumlah;
      $kasmasuk->keluar  = '';
      $kasmasuk->save();

      alert()->success('Menambahkan Kas Masuk','Berhasil')->persistent('Close');
      return redirect()->route('kasmasuk.index');

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
      
      $kasmasuk = Kas::find(base64_decode($id));
      return view('kasmasuk.edit', compact('kasmasuk'));

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
        'nama'=> 'required',
        'keterangan'=> 'required',
        'jumlah'=>'required'
      ]);
      $kasmasuk = Kas::find($id);
      $kasmasuk->tgl = $request->tgl;
      $kasmasuk->nama = $request->nama;
      $kasmasuk->keterangan = $request->keterangan;
      $kasmasuk->jumlah = $request->jumlah;
      $kasmasuk->jenis  = 'masuk';
      $kasmasuk->masuk  = $request->jumlah;
      $kasmasuk->keluar  = '';
      $kasmasuk->save();
      Alert()->success('Mengupdate Kas masuk', 'Berhasil')->persistent('close');
      return redirect()->route('kasmasuk.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kasmasuk = Kas::find($id);
      $kasmasuk->delete();
      alert()->success('Menghapus Kas masuk', 'Berhasil')->persistent('close');
      return redirect()->route('kasmasuk.index');
    }
    public function exportpdf()
    {
      $kasmasuk = Kas::all()->where('jenis','masuk');
      $pdf = PDF::loadview('kasmasuk.exportpdf.jumlahpemasukan',['kasmasuk'=>$kasmasuk]);
      return $pdf->setPaper('a4')->download("jumlahpemasukan.pdf");
    }

    public function exportpdfperiode(Request $request)
    {   
      $from = $request->get('tgl');
      $to   = $request->get('created_at');
      $kasmasuk = Kas::whereBetween('tgl',[$from, $to])->where('jenis','masuk')->get();                     
      $pdf = PDF::loadview('kasmasuk.exportpdf.jumlahpemasukanper',['kasmasuk'=>$kasmasuk, 'from' => $from, 'to' => $to]);
      return $pdf->setPaper('a4')->download("jumlahpemasukanper.pdf");            

    }

    public function exportExcel()
    {
      $kasmasuk = Kas::all()->where('jenis','masuk');
      \Excel::create('Laporan Kas Masuk', function($excel) use ($kasmasuk){
        $excel->setTitle('Laporan Kas Masuk');
        $excel->sheet('Data Pemasukan', function($sheet) use ($kasmasuk){
          $row = 1;
          $sheet->row($row, [
            'Tanggal',
            'Nama',
            'Keterangan',
            'Jumlah'
          ]);
          foreach ($kasmasuk as $item) {
            $sheet->row(++$row, [
             date('d F Y', strtotime($item->tgl)),
             $item->nama,
             $item->keterangan,
             'Rp.' . number_format($item->jumlah)
           ]);
          }
        });
      })->export('xls');
    }

    public function exportexcelper(Request $request)
    {
      $from = $request->get('tgl');
      $to   = $request->get('created_at');
      $kasmasuk = Kas::whereBetween('tgl',[$from, $to])->where('jenis','masuk')->get();
      \Excel::create('Laporan Kas Masuk Per Periode', function($excel) use ($kasmasuk){
        $excel->setTitle('Laporan Kas Masuk Periode');
        $excel->sheet('Data Pemasukan Periode', function($sheet) use ($kasmasuk){
          $row = 1;
          $sheet->row($row, [
            'Tanggal',
            'Nama',
            'Keterangan',
            'Jumlah'
          ]);
          foreach ($kasmasuk as $item) {
            $sheet->row(++$row, [
             date('d F Y', strtotime($item->tgl)),
             $item->nama,
             $item->keterangan,
             'Rp.' . number_format($item->jumlah)
           ]);
          }
        });
      })->export('xls'); 
    }
    

  }

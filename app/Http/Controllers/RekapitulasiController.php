<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kas;
use Carbon\Carbon;
use DB;
use Alert;
use PDF;
use Excel;
class RekapitulasiController extends Controller
{

    public function index(Request $request)
    {
        $from = $request->get('tgl');
        $to   = $request->get('created_at');

    	$kasmasuk = Kas::all()->where('jenis','masuk');
    	$kaskeluar= Kas::all()->where('jenis','keluar');
        $rekapitulasi = Kas::all();
        $kas = Kas::whereBetween('tgl', [$from, $to])->get();

        $tglterpilih = $from;
        $tglterpilih2 = $to;

    	return view('rekapitulasi.index', compact('rekapitulasi','kas','kasmasuk','kaskeluar','tglterpilih','tglterpilih2'));
    }

    public function exportpdfrekap()
    {
    	$rekapitulasi = Kas::all();
    	$kasmasuk = Kas::all()->where('jenis','masuk');
    	$kaskeluar= Kas::all()->where('jenis','keluar');
    	$pdf = PDF::loadview('rekapitulasi.exportpdfrekap.rekapitulasireport',['rekapitulasi'=>$rekapitulasi, 'kasmasuk' => $kasmasuk, 'kaskeluar' => $kaskeluar]);
    	return $pdf->setPaper('a4')->download("rekapitulasireport.pdf");
    }

   public function exportpdfperioderekap(Request $request)
   {   
     $from = $request->get('tgl');
     $to   = $request->get('created_at');
     $rekapitulasi = Kas::whereBetween('tgl',[$from, $to])->get(); 
     $kasmasuk = Kas::all()->where('jenis','masuk');
     $kaskeluar= Kas::all()->where('jenis','keluar');                    
     $pdf = PDF::loadview('rekapitulasi.exportpdfrekap.rekapitulasireportper',['rekapitulasi'=>$rekapitulasi, 'from' => $from, 'to' => $to,'kasmasuk' => $kasmasuk,'kaskeluar' => $kaskeluar]);
     return $pdf->setPaper('a4')->download("rekapitulasireportper.pdf");            

   }




}

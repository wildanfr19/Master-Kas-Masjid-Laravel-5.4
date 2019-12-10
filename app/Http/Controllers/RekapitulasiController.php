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

    public function index()
    {
    	$rekapitulasi = Kas::all();
    	$kasmasuk = Kas::all()->where('jenis','masuk');
    	$kaskeluar= Kas::all()->where('jenis','keluar');
    	return view('rekapitulasi.index', compact('rekapitulasi','kasmasuk','kaskeluar'));
    }

    public function exportpdfrekap()
    {
    	$rekapitulasi = Kas::all();
    	$kasmasuk = Kas::all()->where('jenis','masuk');
    	$kaskeluar= Kas::all()->where('jenis','keluar');
    	$pdf = PDF::loadview('rekapitulasi.exportpdfrekap.rekapitulasireport',['rekapitulasi'=>$rekapitulasi, 'kasmasuk' => $kasmasuk, 'kaskeluar' => $kaskeluar]);
    	return $pdf->setPaper('a4')->download("rekapitulasireport.pdf");
    }


}

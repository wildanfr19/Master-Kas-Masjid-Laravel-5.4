<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\Kas;
use Carbon\Carbon;
use Charts;
use DB;
class DashboardController extends Controller
{
    public function index()
    {	

    	$kas = Kas::where(DB::raw("(DATE_FORMAT(tgl, '%Y'))"), date('Y'))->get();
    	$chart = Charts::database($kas,'bar','highcharts')
    							->title('Report Rekapitulasi Kas')
    							->elementLabel("Report Rekapitulasi Kas")
    							->dimensions(1000, 500)
    							->responsive(false)
    							->groupByYear();

    	$kasmasuk = Kas::all()->where('jenis','masuk');
    	$kaskeluar= Kas::all()->where('jenis','keluar');
    	return view('dashboard.index', compact('kasmasuk', 'kaskeluar','totalsaldoakhir','chart'));
    }


}

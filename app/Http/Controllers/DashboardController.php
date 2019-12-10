<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use App\Kas;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
    	$kasmasuk = Kas::all()->where('jenis','masuk');
    	$kaskeluar= Kas::all()->where('jenis','keluar');
    	return view('dashboard.index', compact('kasmasuk', 'kaskeluar','totalsaldoakhir'));
    }
}

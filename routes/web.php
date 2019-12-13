<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'checkRole:admin,user']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/kasmasuk/json', 'KasMasukController@dashboard')->name('kasmasuk.dashboard');
    Route::resource('kasmasuk', 'KasMasukController');
    Route::get('/exportpdf', 'KasMasukController@exportpdf')->name('kasmasuk.exportpdf');
    Route::get('/exportpdfperiode', 'KasMasukController@exportpdfperiode')->name('kasmasuk.exportpdfperiode');
    Route::get('/exportexcel', 'KasMasukController@exportExcel')->name('kasmasuk.exportexcel');
    Route::get('/exportexcelper', 'KasMasukController@exportexcelper')->name('kasmasuk.exportexcelper');

    Route::get('/kaskeluar/json', 'KasKeluarController@dashboard')->name('kaskeluar.dashboard');
    Route::resource('kaskeluar','KasKeluarController');
    Route::get('/exportpdfkel', 'KasKeluarController@exportpdfkel')->name('kaskeluar.exportpdfkel');
    Route::get('/exportpdfperiodekel', 'KasKeluarController@exportpdfperiodekel')->name('kaskeluar.exportpdfperiodekel');
    Route::get('/exportexcelkel', 'KasKeluarController@exportExcelkel')->name('kaskeluar.exportexcelkel');
    Route::get('/exportexcelperkel', 'KasKeluarController@exportexcelperkel')->name('kaskeluar.exportexcelperkel');

    Route::get('/rekapitulasi','RekapitulasiController@index')->name('rekapitulasi.index');
    Route::get('/exportpdfrekap', 'RekapitulasiController@exportpdfrekap')->name('rekapitulasi.exportpdfrekap');
    Route::get('/exportpdfperioderekap', 'RekapitulasiController@exportpdfperioderekap')->name('rekapitulasi.exportpdfperioderekap');

    Route::get('/dashboarduser', 'ManajemenUserController@dashboard')->name('user.dashboard');
    Route::resource('/user', 'ManajemenUserController');

});
Route::group(['middleware' => ['auth', 'checkRole:admin,user']], function() {
     Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
     Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
     Route::get('/kasmasuk/json', 'KasMasukController@dashboard')->name('kasmasuk.dashboard');
     Route::resource('kasmasuk', 'KasMasukController');
     Route::get('/exportpdf', 'KasMasukController@exportpdf')->name('kasmasuk.exportpdf');
     Route::get('/exportpdfperiode', 'KasMasukController@exportpdfperiode')->name('kasmasuk.exportpdfperiode');
     Route::get('/exportexcel', 'KasMasukController@exportExcel')->name('kasmasuk.exportexcel');
     Route::get('/exportexcelper', 'KasMasukController@exportexcelper')->name('kasmasuk.exportexcelper');

     Route::get('/kaskeluar/json', 'KasKeluarController@dashboard')->name('kaskeluar.dashboard');
     Route::resource('kaskeluar','KasKeluarController');
     Route::get('/exportpdfkel', 'KasKeluarController@exportpdfkel')->name('kaskeluar.exportpdfkel');
     Route::get('/exportpdfperiodekel', 'KasKeluarController@exportpdfperiodekel')->name('kaskeluar.exportpdfperiodekel');
     Route::get('/exportexcelkel', 'KasKeluarController@exportExcelkel')->name('kaskeluar.exportexcelkel');
     Route::get('/exportexcelperkel', 'KasKeluarController@exportexcelperkel')->name('kaskeluar.exportexcelperkel');

     Route::get('/rekapitulasi','RekapitulasiController@index')->name('rekapitulasi.index');
     Route::get('/exportpdfrekap', 'RekapitulasiController@exportpdfrekap')->name('rekapitulasi.exportpdfrekap');
     Route::get('/exportpdfperioderekap', 'RekapitulasiController@exportpdfperioderekap')->name('rekapitulasi.exportpdfperioderekap');
});




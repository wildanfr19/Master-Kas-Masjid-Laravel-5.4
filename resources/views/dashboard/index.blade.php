@extends('layouts.master')
@section('title','Dashboard	')
@section('content')
<div class="content">
{{-- 	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
					<h5 class="text-white op-7 mb-2">Aplikasi Pengelolaan Kas Masjid</h5>
				</div>
			{{-- 	<div class="pull-right" style="margin-left: 0%">
					<img src="{{ asset('images/logodkm.jpg') }}" width="80" height="100" alt="">
				</div> --}}
				
	{{-- 		</div>
		</div>
	</div> --}}
	<div class="page-inner mt--8">
		<div class="row mt--2">
			<div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
						<div class="card-title">Master Pengelolaan Kas Masjid </div>
						<div class="card-title">
						</div>
						<hr>
						<div class="card-title"><i class="fas fa-chart-bar"></i> Statistik </div>
						<div class="card-category"></div>
						<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
							<div class="col-sm-3 col-md-3">
								<div class="card card-stats card-success card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-file-import"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Pemasukan</p>
													@php $totaljumpem = 0; @endphp
													@foreach($kasmasuk as $key => $item)
													@php $totaljumpem += $item['jumlah']; @endphp
													@endforeach
													<p>Rp.{{ format_rupiah($totaljumpem) }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>		
							<div class="col-sm-3 col-md-3">
								<div class="card card-stats card-info card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-file-export"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Pengeluaran</p>
													@php $totaljumpeng = 0; @endphp
													@foreach($kaskeluar as $key => $item)
													@php $totaljumpeng += $item['jumlah']; @endphp
													@endforeach
													<p>Rp.{{ format_rupiah($totaljumpeng) }}</p>
													<p></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="col-sm-3 col-md-3">
								<div class="card card-stats card-warning card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-money-bill-alt"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Total Saldo</p>
													<p>Rp.{{ format_rupiah($totaljumpem - $totaljumpeng) }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<br>
				{{-- 			<div class="row">
							       <div class="col-md-7 col-md-offset-2">
							           <div class="panel panel-default">
							               <div class="panel-heading"></div>

							               <div class="panel-body">
							              	{!! $chart->render() !!}
							               </div>
							           </div>
							       </div>
							   </div>
						</div> --}}
					{{-- 	<div class="col-md-6">
								<div class="card-body">
									<div class="chart-container" style="margin-left: 3%">
										<img src="{{ asset('images/logodkm.jpg') }}" width="300" height="300">
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
	</div>
</div>
@endsection
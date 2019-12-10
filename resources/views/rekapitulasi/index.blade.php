@extends('layouts.master')
@section('title','Data Kas Masuk')
@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><i class="far fa-file-alt"></i> Rekapitulasi</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{ route('dashboard.index') }}">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="far fa-file-alt"></i> Rekapitulasi</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="fas fa-info-circle"></i> List Rekapitulasi</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fas fa-clipboard-list"></i> Rekapitulasi Report</h4>
					</div>
					<br>
					<div class="box-header" style="margin-left: 3%">
						<button type="button" class="btn btn-sm btn-primary btn-border" data-toggle="modal" data-target="#exampleModalPDF"><i class="fas fa-print"></i> Cetak PDF</button>
					</div>  
					<div class="card-body">
						<div class="table-responsive">
							<table id="users-table" cellspacing="0" width="100%" class="table table-bordered  table-striped table-condensed" >
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>Jenis</th>
										<th>Masuk</th>
										<th>Keluar</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1; @endphp
									@foreach($rekapitulasi as $rekap)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ date('d F Y', strtotime($rekap->tgl))  }}</td>
										<td>{{ $rekap->keterangan }}</td>
										<td>{{ $rekap->jenis }}</td>
										<td style="text-align: right;">{{ number_format($rekap->masuk) }},-	</td>
										<td style="text-align: right">{{ number_format($rekap->keluar) }},-</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr style="text-align: right;">
										<th colspan="4"><h4 style="font-weight: bold">Total Pemasukan</h4></th>
										<th>:</th>
										@php $totaljumpem = 0; @endphp
										@foreach($kasmasuk as $key => $item)
										@php $totaljumpem += $item['jumlah']; @endphp
										@endforeach
										<th>Rp.{{ number_format($totaljumpem) }},-</th>
									</tr>
									<tr style="text-align: right;">

										<th colspan="4"><h4 style="font-weight: bold">Total Pengeluaran</h4></th>
										<th>:</th>
										@php $totaljumpeng = 0; @endphp
										@foreach($kaskeluar as $key => $item)
										@php $totaljumpeng += $item['jumlah']; @endphp
										@endforeach
										<th>Rp.{{ number_format($totaljumpeng) }},-</th>
									</tr>
									<tr style="text-align: right;">
										<th colspan="4"><h4 style="font-weight: bold">Total Saldo Akhir</h4></b></th>
										<th>:</th>
										<th>Rp.{{ number_format($totaljumpem - $totaljumpeng) }},-</th>
									</tr>
								</tfoot>
							</table>
				
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@include('rekapitulasi.modal.create')
@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable();
});
</script>





@endpush

@extends('layouts.master')
@section('title','Rekapitulasi')
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

						<a class="btn btn-sm btn-primary" href="{{ route('rekapitulasi.index') }}" onclick="event.preventDefault();
						document.getElementById('rekap-form').submit();"><i class=" fas fa-undo-alt"></i> 
						Refresh Data
						<form id="rekap-form" action="{{ route('rekapitulasi.index') }}" method="get">
						    {{ csrf_field() }}
						</form>
						</a>
					</div>  
					<br>
					<br>
						<div class="box-header" style="margin-left: 20%; margin-top: 8px;">
							<div class="row">

								<div class="col-md-3">
							   <form action="{{ route('rekapitulasi.index') }}" method="get">
								{{ csrf_field() }}
									<input type="date" name="tgl" autocomplete="true" class="form-control input-pill"  id="pillInput" placeholder="">
		
									
								</div>
								<div class="col-md-3">
									<input type="date" name="created_at"  class="form-control input-pill"  id="pillInput" placeholder="Nama">

								</div>
						

								<div class="col-md-2">
									<button id="display" type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Display">Display</button>
								</form>
								</div>

							</div>
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
								@if($tglterpilih != null AND $tglterpilih2 != null)	
									@php $no = 1; @endphp
									@foreach($kas as $rekap)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ date('d F Y', strtotime($rekap->tgl))  }}</td>
										<td>{{ $rekap->keterangan }}</td>
										<td>{{ $rekap->jenis }}</td>
										<td style="text-align: right;">{{ format_rupiah($rekap->masuk) }},-</td>
										<td style="text-align: right">{{ format_rupiah((float)$rekap->keluar) }},-</td>
									</tr>
									@endforeach
								@elseif($tglterpilih === null AND $tglterpilih2 === null)
									@php $no = 1; @endphp
									@foreach($rekapitulasi as $rekap)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ date('d F Y', strtotime($rekap->tgl))  }}</td>
										<td>{{ $rekap->keterangan }}</td>
										<td>{{ $rekap->jenis }}</td>
										<td style="text-align: right;">{{ format_rupiah($rekap->masuk) }},-</td>
										<td style="text-align: right">{{ format_rupiah((float)$rekap->keluar) }},-</td>
									</tr>
									@endforeach
								@endif				
								</tbody>
								<tfoot>
									<tr style="text-align: right;">
										<th colspan="4"><h6 style="font-weight: bold">Total Pemasukan</h6></th>
										<th>:</th>
										@php $totaljumpem = 0; @endphp
										@foreach($kasmasuk as $key => $item)
										@php $totaljumpem += $item['jumlah']; @endphp
										@endforeach
										<th>Rp.{{ format_rupiah($totaljumpem) }},-</th>
									</tr>
									<tr style="text-align: right;">

										<th colspan="4"><h6 style="font-weight: bold">Total Pengeluaran</h6></th>
										<th>:</th>
										@php $totaljumpeng = 0; @endphp
										@foreach($kaskeluar as $key => $item)
										@php $totaljumpeng += $item['jumlah']; @endphp
										@endforeach
										<th>Rp.{{ format_rupiah($totaljumpeng) }},-</th>
									</tr>
									<tr style="text-align: right;">
										<th colspan="4"><h6 style="font-weight: bold">Total Saldo Akhir</h6></b></th>
										<th>:</th>
										<th>Rp.{{ format_rupiah($totaljumpem - $totaljumpeng) }},-</th>
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
$(document).ready(function() {
	 $('#users-table').DataTable();

    $('#display').click( function () {
    	ajax.reload();
    });

});
   
</script>





@endpush

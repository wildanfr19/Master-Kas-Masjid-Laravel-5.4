@extends('layouts.master')
@section('title',' Data User')
@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><i class="far fa-file-alt"></i> Data User</h4>
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
					<a href="#"><i class="far fa-file-alt"></i> Data User</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="fas fa-info-circle"></i> List Data User</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fas fa-clipboard-list"></i> List Data User</h4>
					</div>
					<div class="box-header" style="margin-left: 29px; margin-top: 8px;">
						<button type="submit" class="btn  btn-primary btn-sm btn-round" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah </button>
						{{-- <a href="{{ route('kasmasuk.exportexcel') }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Cetak Excel">
						<i class="far fa-file-excel"></i> Cetak Excel
						</a> --}}
{{-- 						<button type="button" class="btn btn-primary btn-border btn-sm btn-round" data-toggle="modal" data-target="#exampleModalExcel"><i class="far fa-file-excel"></i> Cetak Excel</button>

						<button type="button" class="btn btn-primary btn-border btn-sm btn-round" data-toggle="modal" data-target="#exampleModalPDF"><i class="fas fa-print"></i> Cetak PDF</button> --}}

						{{-- <a href="{{ route('kasmasuk.exportpdf') }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Cetak PDF">
						<i class="far fa-file-pdf"></i> Cetak PDF
						</a> --}}
					</div>
					<br>
				{{-- 	<div class="box-header" style="margin-left: 20%; margin-top: 8px;">
						<div class="row">

							<div class="col-md-3">
						
								{!! Form::number('tahun', \Carbon\Carbon::now()->year, ['class'=>'form-control input-pill']) !!}
								{!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
								
							</div>
							<div class="col-md-3">
								{!! Form::selectMonth('bulan', \Carbon\Carbon::now()->month, ['class'=>'form-control input-pill']) !!}
								{!! $errors->first('bulan', '<p class="help-block">:message</p>') !!}
							</div>
					

							<div class="col-md-2">
								<button id="display" type="button" class="form-control btn btn-primary" data-toggle="tooltip" data-placement="top" title="Display">Display</button>
							</div>
						</div>
					</div>  --}} 
					<div class="card-body">
						<div class="table-responsive">
							<table id="users-table" cellspacing="0" width="100%" class="table table-condensed" >
								<thead>
									<tr>
										<th>No</th>
										<th>Role</th>
										<th>Foto</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>No Hp</th>
										<th>Email</th>
										<th style="width: 20%">Action</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1 ;@endphp
									@foreach($user as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $row->role }}</td>
										<td>
										<center>
											@if($row->foto != null)
											 <img src="images/{{ $row->foto }}" alt="" width="50" height="50">
											@else 
											   <img src="images/man-1.png" alt="" width="50" height="50">
											@endif   
										</center>
										</td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->alamat }}</td>
										<td>{{ $row->notelp }}</td>
										<td>{{ $row->email }}</td>
										<td>
											<a href="{{ route('user.edit', $row->id) }}" title="" class="btn btn-primary btn-sm btn-round btn-border"><i class="fas fa-edit"></i></a>
											<div class="pull-right">
												<form action="{{ route('user.destroy', $row->id) }}" method="post">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button type="submit" onclick="return confirm('Yakin ?')" class="btn btn-danger btn-sm btn-round"><i class="fas fa-trash"></i></button>
											</form>
											</div>
											
										</td>
										
									</tr>
									@endforeach
								</tbody>
							</table>
				
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@include('user.modal.create')
@endsection
@push('scripts')
<script>
$(document).ready(function() {
     $('#users-table').DataTable();

 
});

</script>



@endpush

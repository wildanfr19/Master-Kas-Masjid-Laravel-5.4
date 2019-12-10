@extends('layouts.master')
@section('title','Data Kas Keluar')
@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><i class="far fa-file-alt"></i> Kas Keluar</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="#">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="far fa-file-alt"></i> Kas Keluar</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="fas fa-info-circle"></i> List Kas Keluar</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fas fa-clipboard-list"></i> List Kas Keluar</h4>
					</div>
					<div class="box-header" style="margin-left: 29px; margin-top: 8px;">
						<button type="submit" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalKeluar1"><i class="fas fa-plus-circle"></i> Tambah Kas Keluar</button>

						<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalEyeJumpeng"><i class="fas fa-eye"></i> Lihat Jumlah Pengeluaran</button>

						{{-- <a href="{{ route('kasKeluar.exportexcel') }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Cetak Excel">
						<i class="far fa-file-excel"></i> Cetak Excel
						</a> --}}
						<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalExcel"><i class="far fa-file-excel"></i> Cetak Excel</button>

						<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalPDF"><i class="fas fa-print"></i> Cetak PDF</button>

						{{-- <a href="{{ route('kasKeluar.exportpdf') }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Cetak PDF">
						<i class="far fa-file-pdf"></i> Cetak PDF
						</a> --}}
					</div>
					<br>
					<div class="box-header" style="margin-left: 20%; margin-top: 8px;">
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
								<button id="display" type="button" class="form-control btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Display">Display</button>
							</div>
						</div>
					</div>  
					<div class="card-body">
						<div class="table-responsive">
							<table id="users-table" cellspacing="0" width="100%" class="table table-striped table-condensed" >
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>Jumlah</th>
										<th style="width: 14%">Action</th>
									</tr>
								</thead>
							</table>
				
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@include('kaskeluar.modal.create')
@include('kaskeluar.modal.jumlahpeng')
@include('kaskeluar.modal.exportpdf_modal')
@include('kaskeluar.modal.exportexcel_modal')
@endsection
@push('scripts')
<script>
$(document).ready(function() {
        var tableDetail = $('#users-table').DataTable({
        	"columnDefs": [{
        	  "searchable": false,
        	  "orderable": false,
        	  "targets": 0,

        	  render: function (data, type, row, meta) {
        	    return meta.row + meta.settings._iDisplayStart + 1;
        	  }
        	}],
        	"aLengthMenu": [[5, 10, 25, 50, 75, 100, -1], [5, 10, 25, 50, 75, 100, "All"]],
        	"iDisplayLength": 10,
        	processing: true, 
        	responsive: true,
        	"order": [[1, 'asc']],
        	"oLanguage": {
        	  'sProcessing': '<div id="processing" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001; opacity: 0.8;"><p style="position: absolute; color: White; top: 50%; left: 45%;"><img src="{{ asset('images/ajax-loader.gif') }}"></p></div>Processing...'
        	},
            serverSide: true,
            ajax: '{{ route('kaskeluar.dashboard') }}',
            columns: [
                {data: null, name: null},
                { data: 'tgl', name: 'tgl' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'action', name: 'action' }
            ]


        });
       $("#users-table").on('preXhr.dt', function(e, settings, data) {
         data.tahun = $('input[name="tahun"]').val();
         data.bulan = $('input[name="bulan"]').val();
       });

       $('#display').click( function () {
       	tableDetail.ajax.reload();
       });
        
 
});

</script>



@endpush

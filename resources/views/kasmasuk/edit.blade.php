@extends('layouts.master')
@section('title','Edit Data Kas Masuk')
@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title"><i class="far fa-file-alt"></i> Kas Masuk</h4>
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
					<a href="#"><i class="far fa-file-alt"></i> Kas Masuk</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="fas fa-info-circle"></i> List Kas Masuk</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="fas fa-edit"></i> Ubah Kas Masuk</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fas fa-edit"></i> Ubah Kas Masuk</h4>
					</div>
					
					<div class="card-body">
						<form action="{{ route('kasmasuk.update', $kasmasuk->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('put') }}
							<div class="form-group">
								<label for="">Tgl Kas Masuk</label>
								<input type="date" name="tgl" value="{{ $kasmasuk->tgl }}" class="form-control" id=""  placeholder="Tgl Kas Masuk">
							</div>
							<div class="form-group">
								<label for="">nama</label>
								<input type="text" name="nama" value="{{ $kasmasuk->nama }}" class="form-control"  placeholder="nama">
							</div>
							<div class="form-group">
								<label for="">Keterangan</label>
								<input type="text" name="keterangan" value="{{ $kasmasuk->keterangan }}" class="form-control"  placeholder="Keterangan">
							</div>
							<div class="form-group">
								<label for="">Jumlah</label>
								<input type="text" name="jumlah" value="{{ $kasmasuk->jumlah }}" class="form-control"  placeholder="Jumlah">
							</div>
							<br>
							<div class="box-header" style="margin-left: 14px;">
								<button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i> Simpan</button>
								<a href="{{ route('kasmasuk.index') }}" class="btn btn-sm btn-warning" title="">Kembali</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection


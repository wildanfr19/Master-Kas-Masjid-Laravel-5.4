@extends('layouts.master')
@section('title','Edit Data Data User')
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
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><i class="fas fa-edit"></i> Ubah Data User</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fas fa-edit"></i> Ubah Data User</h4>
					</div>
					
					<div class="card-body">
						<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('put') }}
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" name="name" value="{{ $user->name }}" class="form-control" id=""  placeholder="Nama">
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" name="alamat" value="{{ $user->alamat }}" class="form-control"  placeholder="Alamat">
							</div>
							<div class="form-group">
								<label for="">No HP</label>
								<input type="text" name="notelp" value="{{ $user->notelp }}" class="form-control"  placeholder="Keterangan">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" value="{{ $user->email }}" class="form-control"  placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">foto</label>
								<input type="file" name="foto"  class="form-control"  placeholder="foto">
							</div>
							<br>
							<div class="box-header" style="margin-left: 14px;">
								<button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i> Simpan</button>
								<a href="{{ route('user.index') }}" class="btn btn-sm btn-warning" title="">Kembali</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection


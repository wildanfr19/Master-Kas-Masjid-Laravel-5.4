<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="pillInput">Nama</label>
		<input type="text" name="name" autocomplete="true" class="form-control input-pill"  id="pillInput" placeholder="Nama" required>
	</div>

	<div class="form-group">
		<label for="pillInput">Alamat</label>
		<input type="text" name="alamat" class="form-control input-pill"  id="pillInput" placeholder="Alamat" required>
	</div>

	<div class="form-group">
		<label for="pillInput">No Telepon</label>
		<input type="text" name="notelp" class="form-control input-pill" id="pillInput" placeholder="No Telepon" required>
	</div>
	<div class="form-group">
		<label for="pillInput">Email</label>
		<input type="email" name="email" class="form-control input-pill" id="pillInput" placeholder="Email" required>
	</div>
	<div class="form-group">
		<label for="pillInput">Foto</label>
		<input type="file" name="foto" class="form-control input-pill" id="pillInput" placeholder="foto" required>
	</div>
	<br>
	<div class="modal-footer">

		<button type="submit" class="btn btn-sm btn-primary "><i class="fas fa-save"></i> Simpan</button>
		<button type="button" class="btn btn-sm btn-primary btn-border" data-dismiss="modal">Batal</button>
	</div>
</form>
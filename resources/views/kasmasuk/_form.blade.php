<form action="{{ route('kasmasuk.store') }}" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="pillInput">Tanggal Kas Masuk</label>
		<input type="date" name="tgl" autocomplete="true" class="form-control input-pill"  id="pillInput" placeholder="" required>
	</div>

	<div class="form-group">
		<label for="pillInput">Nama</label>
		<input type="text" name="nama" class="form-control input-pill"  id="pillInput" placeholder="Nama" required>
	</div>

	<div class="form-group">
		<label for="pillInput">Keterangan</label>
		<input type="text" name="keterangan" class="form-control input-pill" id="pillInput" placeholder="Keterangan" required>
	</div>
	<div class="form-group">
		<label for="pillInput">Jumlah</label>
		<input type="number" name="jumlah" class="form-control input-pill" id="pillInput" placeholder="Jumlah" required>
	</div>
	<br>
	<div class="modal-footer">

		<button type="submit" class="btn btn-sm btn-primary "><i class="fas fa-save"></i> Simpan</button>
		<button type="button" class="btn btn-sm btn-primary btn-border" data-dismiss="modal">Batal</button>
	</div>
</form>
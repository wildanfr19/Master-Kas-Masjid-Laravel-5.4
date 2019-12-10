<form action="{{ route('rekapitulasi.exportpdfperioderekap') }}" method="get">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="pillInput">Dari Tanggal</label>
		<input type="date" name="tgl" autocomplete="true" class="form-control input-pill"  id="pillInput" placeholder="" required>
	</div>

	<div class="form-group">
		<label for="pillInput">Sampai Tanggal</label>
		<input type="date" name="created_at" class="form-control input-pill"  id="pillInput" placeholder="Nama" required>
	</div>
{{-- 
		<div class="modal-footer"> --}}
			<br>
			<div class="pull-right">
				<button type="submit" class="btn btn-sm btn-primary "><i class="fas fa-print"></i> Cetak PDF Per Periode</button>
				<a href="{{ route('rekapitulasi.exportpdfrekap') }}" class="btn btn-sm btn-primary" title=""><i class="fas fa-print"> </i>Cetak PDF Semua</a>
			</div>
		
{{-- 		</div> --}}
		
	</div>
</form>
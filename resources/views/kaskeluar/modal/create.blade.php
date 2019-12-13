
 <div class="modal fade" id="exampleModalKeluar1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i>  Tambah </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				@php $totaljumpem = 0; @endphp
				@foreach($kasmasuk as $key => $item)
					@php
					   $totaljumpem += $item['jumlah'];
					@endphp
				@endforeach
				@if($totaljumpem == '0')
				<div class="alert alert-danger">
					<center><h4 style="color: red">PERINGATAN! <br>Saldo Kas Rp.0,- tidak bisa melakukan Transaksi Pengeluaran</h4></center>
				</div>
				@endif
				@include('kaskeluar._form')
			</div>		  
		</div>
	</div>
</div>	



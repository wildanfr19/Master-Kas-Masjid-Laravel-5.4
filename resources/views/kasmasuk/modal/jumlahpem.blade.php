<!-- Modal -->
<div class="modal fade" id="exampleModalEye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Jumlah Pemasukan Kas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td><h4><b>Tanggal</b></h4></td>
						<td></td>
						<td><h4>:</h4></td>
						<td><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse()->format('d/m/Y' ) }}</h4></td>
					</tr>
					<tr>
						<td><h4><b>Total Jumlah Pemasukan</b></h4></td>
						<td></td>
						<td><h4>:</h4></td>
						@php $totaljumpem = 0; @endphp
						@foreach($kasmasuk as $key => $item)
						@php

						$totaljumpem += $item['jumlah'];

						@endphp
						@endforeach

						<td><b><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{ number_format($totaljumpem) }}</h4></b> </td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>
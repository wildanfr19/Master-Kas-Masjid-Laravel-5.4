<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			width: 80%;
			margin: 0 auto;
			border: 1px solid;
		}
		h3, h4, p {
			text-align: center;
		}
		hr {
			border : 1px solid;
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


	<h4><b>DKM MASJID</b></h4>
	<h4><b>MASJID JAMI BAETUL ANWAR</b></h4>
	<p><b>Dusun Selang 1 RT011/RW003 Desa Ciwaringin Kec.Lemahabang Wadas</b></p>
	<hr>

	<font face="Arial" color="black"> <p align="center"> <u> <b> Laporan Kas Masuk </b></u> <br/> Tanggal : {{ \Carbon\Carbon::parse($from)->format('d-M-Y') }}&nbsp; - &nbsp; {{ \Carbon\Carbon::parse($to)->format('d-M-Y') }}</font>
	 <font face="Arial" color="black"><p align="center">  </p></font>

<table {{-- border="1" cellpadding="1" cellspacing="0" --}} class="table table-striped">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th>Jumlah</th>

		</tr>
	</thead>
	<tbody>
		@php $no =1; @endphp
		@foreach($kasmasuk as $row)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ \Carbon\Carbon::parse($row->tgl)->format('d-M-Y')  }}</td>
			<td>{{ $row->nama }}</td>
			<td>{{ $row->keterangan }}</td>
			<td>Rp.{{ number_format($row->jumlah) }}</td>
		</tr>
		@endforeach
	
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4"><center>Total Jumlah Pemasukan</center></th>
			@php $totaljumpem = 0; @endphp
			@foreach($kasmasuk as $key => $item)
			@php $totaljumpem += $item['jumlah']; @endphp
			@endforeach
			<th>Rp.{{ number_format($totaljumpem) }}</th>
		</tr>
	</tfoot>
</table>

{{-- 	
	<p style="text-align: left;">Total Jumlah Pemasukan : Rp.{{ number_format($totaljumpem) }}

	</p>
	<p style="text-align: right;">
		Karawang, {{ \Carbon\Carbon::now()->format('d-M-Y') }}
	</p>
 --}}

</body>
</html>
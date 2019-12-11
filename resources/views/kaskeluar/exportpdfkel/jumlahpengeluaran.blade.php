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

	<font face="Arial" color="black"> <p align="center"> <u> <b> Laporan Kas Keluar </b></u> <br/> Tanggal : {{ \Carbon\Carbon::now()->format('d-M-Y') }}</font>
	 <font face="Arial" color="black"><p align="center">  </p></font>

<table border="1" cellspacing="0" cellspacing="2">
	
	<thead>
		<tr style="background-color: green">
			<th style="text-align:center; color: white">No</th>
			<th style="text-align:center; color: white">Tanggal</th>
			<th style="text-align:center; color: white">Keterangan</th>
			<th style="text-align:center; color: white">Jumlah</th>

		</tr>
	</thead>
	<tbody>
		@php $no =1; @endphp
		@foreach($kaskeluar as $row)
		<tr>
			<td style="text-align:center;">{{ $no++ }}</td>
			<td style="text-align:center;">{{ date('d F Y', strtotime($row->tgl))  }}</td>
			<td style="text-align:center;">{{ $row->keterangan }}</td>
			<td style="text-align:right;">Rp.{{ format_rupiah($row->jumlah) }}</td>
		</tr>
		@endforeach
	
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3"><center>Total Jumlah Pengeluaran</center></th>
			@php $totaljumpeng = 0; @endphp
			@foreach($kaskeluar as $key => $item)
			@php $totaljumpeng += $item['jumlah']; @endphp
			@endforeach
			<th style="text-align:right;">Rp.{{ format_rupiah($totaljumpeng) }}</th>
		</tr>
	</tfoot>
</table>
<p style="text-align: right; margin-right: 12%; margin-top: 6%">
	Karawang, {{ \Carbon\Carbon::now()->format('d-M-Y') }}
	<br>
	<br>
	<br>
	<br>
	Pengurus DKM Masjid
</p>
</body>
</html>
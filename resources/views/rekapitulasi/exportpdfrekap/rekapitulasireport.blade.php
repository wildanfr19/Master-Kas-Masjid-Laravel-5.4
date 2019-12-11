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
		tr, th {

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
{{-- 	<div style="margin-top: ">
		<img src="images/logodkm.jpg" width="50px" height="50px" alt="">
	</div>
	 --}}

	<h4><b>DKM MASJID</b></h4>
	<h4><b>MASJID JAMI BAETUL ANWAR</b></h4>
	<p><b>Dusun Selang 1 RT011/RW003 Desa Ciwaringin Kec.Lemahabang Wadas</b></p>
	<hr>

	<font face="Arial" color="black"> <p align="center"> <u> <b> Rekapitulasi Report</b></u> <br/> Tanggal : {{ \Carbon\Carbon::now()->format('d-M-Y') }}</font>
	 <font face="Arial" color="black"><p align="center">  </p></font>

	 <table border="1" cellspacing="0" cellspacing="2">
	 	<thead>
	 		<tr style="background-color: green">
	 			<th style="text-align:center; color: white ">No</th>
	 			<th style="text-align:center; color: white ">Tanggal</th>
	 			<th style="text-align:center; color: white  ">Keterangan</th>
	 			<th style="text-align:center; color: white ">Jenis</th>
	 			<th style="text-align:center; color: white ">Masuk</th>
	 			<th style="text-align:center; color: white ">Keluar</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		@php $no = 1; @endphp
	 		@foreach($rekapitulasi as $rekap)
	 		<tr>
	 			<td style="text-align:center; ">{{ $no++ }}</td>
	 			<td style="text-align:center; ">{{ date('d F Y', strtotime($rekap->tgl))  }}</td>
	 			<td style="text-align:center; ">{{ $rekap->keterangan }}</td>
	 			<td style="text-align:center; ">{{ $rekap->jenis }}</td>
	 			<td style="text-align: right;">{{ format_rupiah($rekap->masuk) }},-	</td>
	 			<td style="text-align: right">{{ format_rupiah((float)$rekap->keluar) }},-</td>
	 		</tr>
	 		@endforeach

	 		<tr style="text-align: right;">
	 			<th colspan="4" style="font-weight: bold">Total Pemasukan</th>
	 			<th style="text-align: center">:</th>
	 			@php $totaljumpem = 0; @endphp
	 			@foreach($kasmasuk as $key => $item)
	 			@php $totaljumpem += $item['jumlah']; @endphp
	 			@endforeach
	 			<th>Rp.{{ format_rupiah($totaljumpem) }},-</th>
	 		</tr>
	 		<tr style="text-align: right;">

	 			<th colspan="4" style="font-weight: bold">Total Pengeluaran</th>
	 			<th style="text-align: center">:</th>
	 			@php $totaljumpeng = 0; @endphp
	 			@foreach($kaskeluar as $key => $item)
	 			@php $totaljumpeng += $item['jumlah']; @endphp
	 			@endforeach
	 			<th>Rp.{{ format_rupiah($totaljumpeng) }},-</th>
	 		</tr>
	 		<tr style="text-align: right;">
	 			<th colspan="4" style="font-weight: bold">Total Saldo Akhir</b></th>
	 			<th style="text-align: center">:</th>
	 			<th>Rp.{{ format_rupiah($totaljumpem - $totaljumpeng) }},-</th>
	 		</tr>
	 	</tbody>
	 </table>
	</p>
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
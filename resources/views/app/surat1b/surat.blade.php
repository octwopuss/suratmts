<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Surat Pengajuan Permintaan Data</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
	<style type="text/css">
		@page{ size : A4; }		
		*{
			font-size: 16px;
			font-family: "Times new Roman", Times, Serif;
		}		
		
		.expand {
			column-width: 200px
		}

		#control{			
			margin-left: 50px;
		}
		.control-table{
			margin-left: 30px;
		}
		.control-table-data{
			margin-left: 30px;			
		}
		.ttd{
			width: 280px;
			margin-left: 500px;
		}		
		.control-table-data tr{
			line-height: 30px;
		}
		.line{
			width: 190px;
			height: 1px;
			border-bottom: 1px solid black;			
		}
		.tanggal{
			width: 700px;
			border-collapse: collapse;
		}		
		.tanggal td{
			margin-top: 10px;
		}
		.tanggal td, .tanggal th {
			border: 1px solid black;
		}

		.tanggal tr: first-child th {
			border-top: 0;
		}

		.tanggal tr: last-child td {
			border-bottom: 0;
		}		
		
	</style>	
</head>
<body id="control" class="A4" onload="print()">
<br>
<p>Formulir 1B</p>
<br>
<br>
Yth <b>Ketua</b><br>
u.p. Sekretaris Bidang Akademik & Kemahasiswaan <br>
Program Studio Magister Teknik Sipil <br>
Universitas Lambung Mangkurat <br>
Jl. Brigjend. H. Hasan Basry Banjarmasin 
<br>
<br>
<p>Saya yang bertanda tangan dibawah ini:</p>
<table class="control-table">
	
	<tbody>
		<tr>
			<td>Nama</td>			
			<td>: {{$surat->nama}}</td>
			<td></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td class="expand">: {{$surat->nim}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Bidang Pilihan</td>
			<td>: {{$surat->bidang_pilihan}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Alamat Rumah</td>
			<td>: {{$surat->alamat_rumah}}</td>
			<td>Nomor Telepon/Hp: {{$surat->telepon}}</td>
		</tr>
		<tr>
			<td>Instansi</td>
			<td> : {{$surat->instansi}}</td>
			<td></td>
		</tr>
		<tr>
			<td>Alamat Instansi</td>
			<td>: {{$surat->alamat_instansi}} </td>
			<td>Nomor Telepon: {{$surat->telp_instansi}}</td>
		</tr>
	</tbody>
</table>	
<br>
<p>Sehubungan dengan keperluan penelitian dan penulisan {{$surat->alasan_keperluan}}, maka saya memohon dengan hormat <br>
 membuat surat pengantar permintaan data:</p>
<table class="control-table-data">
		<?php $i = 1; ?>
	<tbody>		
		<tr>
			<td>A.</td>
			<td><b>Data Yang Diperlukan:</b></td>
		</tr>
		@foreach($keperluan as $data)
		<tr>
			<td></td>
			<td>{{$i++}}. {{$data}}</td>
		</tr>
		@endforeach
		<tr>
			<td>B.</td>
			<td><b>Instansi Tujuan: </b>{{$surat->instansi_tujuan}}</td>			
		</tr>
		<tr>
			<td>C.</td>			
			<td><b>Alamat Tujuan: </b>{{$surat->alamat_instansi}}</td>
		</tr>
	</tbody>
</table>
<br>
<p>Demikian permohonan ini saya sampaikan, atas perhatian da dipenuhinya permohonan ini saya ucapkan terima kasih.<br></p>
<br>
<div class="ttd">
	 Banjarmasin, {{$surat->created_at->day}} {{$bulan}} {{$surat->created_at->year}} <br>
	 Pemohon,
	 <br>
	 <br>
	 <br>
	 <br>

	 {{$surat->nama}} <br>
	 <div class="line"></div>
	 <b>NIM</b> &nbsp;&nbsp; {{$surat->nim}}
</div>
<br>
<table class="control-table tanggal">
	<thead>
		<tr>
			<th style="text-align: left" colspan="2">Diterima Tanggal:</th>
			<th style="text-align: left"colspan="2">Proses Tanggal:</th>
			<th style="text-align: left"colspan="2">Selesai Tanggal:</th>
		</tr>
	</thead>
	<tbody>
		<tr style="line-height: 35px;">
			<td>Pukul: </td>			
			<td>Paraf: </td>
			<td>Pukul: </td>			
			<td>Paraf: </td>
			<td>Pukul: </td>			
			<td>Paraf: </td>
		</tr>		
	</tbody>
</table>

<script type="text/javascript">
	print();
</script>	
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Surat Permohonan Bantuan Data</title>	
	<style type="text/css">
  	body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;        
        font: 12pt "Times New Roman";        
    }

    *{
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .custom-line{
        line-height: 1pt;
    }    
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 3cm 2cm 1cm 2cm;
        padding-top: 0;
        margin: 5mm auto;
        /*border: 1px #D3D3D3 solid;*/
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {       
        /*border: 1px red solid;*/
        height: 257mm;        
    }

    .control-table tr{
        vertical-align: top;
    }
    
    @page {
        size: A4;
        margin: 0;
    }

    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
    }
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }    
   	
	</style>
</head>
<body>
<div class="book">
    <div class="page">
    	<div class="header">
            <table>
                <tr>
                    <td style="vertical-align: center;"><img width="90px" src="{{asset('assets/img/logo-ulm.png')}}"></td>
                    <td align="center" width="580px">
                        <p style="font: 10pt 'Arial';">
                            KEMENTERIAN RISET, TEKONOLOGI DAN PENDIDIKAN TINGGI <br>
                            UNIVERSITAS LAMBUNG MANGKURAT <br>
                            FAKULTAS TEKNIK <br>
                            <span style="font-size: 16pt"><b>PROGRAM STUDI MAGISTER TEKNIK SIPIL</b></span><br>
                            <span style="font-size: 9pt;">Gedung Fakultas Teknik Kampus Unlam Banjarmasin 70123<br>
                                Telepon (0511)3304503 Fax. (0511) 3304503 email: psmts@teknikunlam.ac.id, psmts@ft.unlam.ac.id
                            </span>                         
                        </p>                                                            
                    </td>
                </tr>
            </table>            
            <div class="line" style="border-style: solid; border-width: 1.5px; margin-top: 0"></div>
        </div>
        <div class="subpage">        
        <br>	
        	<div class="tanggal" style="float: right;">
        		<p>Banjarmasin, {{$date->day}} {{$month}} {{$tahun}}</p>
        	</div>
        	<table>
        		<tr>
        			<td>Nomor</td>
        			<td>:<b> {{$nomor->nomor}}/</b>{{$nomor->tipe_nomor}}/{{$tahun}}</td>           			
        		</tr>
        		<tr>
        			<td>Perihal</td>
        			<td>: <b><i>Permohonan Bantuan Data</i></b></td>
        		</tr>
                <tr>
                    <td>Lampiran</td>
                    <td>: <b>-</b></td>
                </tr>
        	</table>         	
			<br>
			<br>
			Yth. <b>Kepala</b> 	        
		<br>{{$surat->instansi_tujuan}}
		<br>{{$surat->alamat_tujuan}}
		<br>Di Tempat
		<br><p>Demi kelancaran penelitian dan penulisan {{$surat->alasan_keperluan}} mahasiswa pada Program Studi Magister Teknik
		Sipil Fakultas teknik Universitas Lambung Mangkurat:</p>
		
		<table class="control-table" style="margin-left: 1cm;">
			<tr>
				<td>Nama</td>
                <td>:</td>
				<td> <b>{{$surat->nama}}</b></td>
			</tr>
			<tr>
				<td>NIM</td>
                <td>:</td>
				<td> <b>{{$surat->nim}}</b></td>
			</tr>
			<tr>
				<td width="20%">Bidang Pilihan</td>
                <td>:</td>
				<td> <b>{{$surat->bidang_pilihan}}</b></td>
			</tr>
			<tr>
				<td>Judul</td>
                <td>:</td>
				<td> <b>{{$surat->judul_tesis}}</b></td>
			</tr>
		</table>
		
		<p>Kami mohon dengan hormat kesediaan Bapak/Ibu memberikan bantuan data berupa            
            @if(count($keperluan_data) > 1)            
            :<br>
            <?php $i = 1; ?>                        
                 @foreach($keperluan_data as $data)   
                    {{$i++}}. {{$data}} <br>
                 @endforeach
                 {{$i}}. dan data pendukung lainnya yang akan dipergunakan untuk penelitian dan penulisan tesis tersebut.
                 <br>
                 <br>
            @else
            {{strtolower($keperluan_data[0])}} dan data pendukung lainnya yang akan dipergunakan untuk penelitian dan penulisan tugas tersebut.
            <br>
            @endif          

		Demikian Permohonan ini disampaikan, atas perhatian dan bantuan yang Bapak\Ibu berikan diucapkan terima kasih.
        </p>                    
        
		<div class="ttd" style="float:right;">
			<p>@if($ttd->jabatan == "Sekretaris")
                <br>
                an. Ketua,
                <br>
                {{$ttd->jabatan}} Prodi
                @else
                <br>
                {{$ttd->jabatan}},
                @endif</p>
			<br>
			<br>
			<p><b>{{$ttd->nama}}</b><br>
            NIP {{$ttd->NIP}}</p>			
		</div>
        </div>    
    </div>
</div>
<script type="text/javascript">
	// print();
</script>
</body>
</html>
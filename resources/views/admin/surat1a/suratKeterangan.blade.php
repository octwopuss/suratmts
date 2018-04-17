<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Surat Keterangan Aktif Kuliah</title>	
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

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
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
    				<td><img width="80px" src="{{asset('assets/img/logo-ulm.png')}}"></td>
    				<td align="center" width="580px">
    					<p style="font-size: 13pt;">
    						KEMENTERIAN RISET, TEKONOLOGI DAN PENDIDIKAN TINGGI <br>
    						UNIVERSITAS LAMBUNG MANGKURAT <br>
    						FAKULTAS TEKNIK <br>
    						<b>PROGRAM STUDI MAGISTER TEKNIK SIPIL</b> <br>
    						<span style="font-size: 10pt;">Gedung Fakultas Teknik Kampus Unlam Banjarmasin 70123<br>
    							Telepon (0511)3304503 Fax. (0511) 3304503 email: psmts@teknikunlam.ac.id, psmts@ft.unlam.ac.id
    						</span>    						
    					</p>    					    				    			
    				</td>
    			</tr>
    		</table>    		
    		<div class="line" style="border-style: solid; border-width: 1.5px; margin-top: -0.6cm"></div>    		
    	</div>
        <div class="subpage">        
        <br>	
        <div class="title-container" align="center">
            <p><span class="title" style="font-size: 17pt;"><b><u>SURAT KETERANGAN</u></b></span><br>
            Nomor: 113/UN8.4.1.31.1/KM/2018</p>            
        </div>        	        
        <br>
        <p>Melalui surat ini diterangkan bahwa:</p>        	
		<table style="margin-left: 1cm;">
			<tr>
				<td>Nama</td>
				<td>: <b>{{$surat->nama}}</b></td>
			</tr>
			<tr>
                <td>Alamat Rumah</td>         
                <td>: <b>{{$surat->alamat_rumah}}</b></td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>: <b>{{$surat->instansi}}</b></td>
            </tr>
		</table>
		<br>
		<p>terdaftar sebagai mahasiswa aktif Program Studi Magister Teknik Sipil Fakultas Teknik Universitas Lambung <br> Mangkurat Bidang Pilihan {{$surat->bidang_pilihan}} pada semester genap tahun akademik 2017/2018 dengan Nomor Induk Mahasiswa {{$surat->nim}}</p>
        <p>Demikian surat keterangan ini dibuat untuk dipergunakan sebagai {{strtolower($surat->kegunaan_surat)}}</p>
		<div class="ttd" style="float:right;">
			<p>{{$ttd->jabatan}},</p>
			<br>
			<br>
			<p><b>{{$ttd->nama}}</b><br>
                {{$ttd->NIP}}
            </p>			
		</div>
        </div>    
    </div>
</div>
<script type="text/javascript">	
</script>
</body>
</html>
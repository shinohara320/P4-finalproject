<html>
<head>
    <title> Surat Pernyataan </title>
    <style type= "text/css">
            body {
                font-family: arial; 
                /* background-color : #ccc  */
            }
            .rangkasurat {
                /* width : 980px;
                margin:0 auto;
                background-color : #fff;
                height: 500px;
                padding: 20px; */
            }
            table {
                border-bottom : 5px solid # 000; 
                padding: 2px
            }
            .tengah {
                text-align : center;
                line-height: 5px;
            }


            #judul{
                text-align:center;
            }

            #halaman{
                width: auto; 
                height: auto; 
                position: absolute; 
                /* border: 1px solid;  */
                padding-top: 30px; 
                padding-left: 30px; 
                padding-right: 30px; 
                padding-bottom: 80px;
            }
     </style >
</head>
<body>
<div class = "rangkasurat">
     <table width = "100%">
           <tr>
                 <!-- <td width = "200px"><img src="{{ asset('') }}assets_admin/img/logonew.png" width="100%"></td> -->
                 <td class="tengah">
                       <h2>BEM STMIK BANDUNG</h2>
                     
                       <h4>Jl. Cikutra No.113, Cikutra, </h4>
                       <h4> Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40124</h4>
                 </td>
            </tr>
            <hr>
     </table >
  
     <div id=halaman>
         <h3 id=judul>SURAT PERNYATAAN</h3>
     
         <p>Saya yang bertanda tangan di bawah ini :</p>
     
         <table>
             <tr>
                 <td style="width: 30%;">Nama</td>
                 <td style="width: 5%;">:</td>
                 <td style="width: 65%;">Ketum BEM STMIK BANDUNG</td>
             </tr>
             <tr>
                <td style="width: 30%;">No telp</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">(021) 1234567</td>
            </tr>
             <tr>
                 <td style="width: 30%; vertical-align: top;">Alamat</td>
                 <td style="width: 5%; vertical-align: top;">:</td>
                 <td style="width: 65%;">Jalan Cikutra No.113, Cikutra, Kecamatan Cibeunying Kidul, Kota Bandung, Jawa Barat 40124</td>
             </tr>
            
         </table>
         <p>Dengan ini menyatakan bahwa: </p>
         <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$detail_pendaftaran->nama_lengkap}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$detail_pendaftaran->tempat_lahir}}, {{$detail_pendaftaran->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$detail_pendaftaran->alamat_lengkap}}</td>
            </tr>
         
        </table>
         <p align = "justify">Mahasiswa yang bersangkutan telah diterima sebagai anggota baru <strong>BEM STMIK BANDUNG</strong> Yang bersangkutan dapat melaksanakan agenda pelatihan lebih lanjut, 
            sesuai agenda Open Rekrutmen BEM 2024 oleh panitia.</p>
     
         <div style="width: 30%; text-align: left; float: right;">Jakarta, {{date('d-m-Y')}}</div><br><br> 
         <div style="width: 30%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
         <div style="width: 30%; text-align: left; float: right;">KETUM BEM STMIK BANDUNG</div>
     
     </div>
</div>

</body>
</html>
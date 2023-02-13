<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
       

        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #C3B091;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> Laporan </h3>
        </div>
        <p> Laporan Transaksi dari <b><?=tgl_indonesia($awal) ?></b> sampai <b><?=tgl_indonesia($akhir) ?></b> </p>
        <table id="table">
            <thead>
                <tr>
                      <th>No</th>
                      <th>Hari/Tanggal</th>
                      <th>Kategori</th>
                      <th>Catatan</th>
                      <th>Pengeluaran</th>
                      <th>Pemasukan</th>
                </tr>
            </thead>
            <tbody>
                
                  <?php foreach($datafilter as $no => $ms) : ?>
                    <tr>
                    <td> <?= $no+1 ?></td>
                    <td> <?= tgl_indonesia($ms->create_at) ?></td>
                    <td> <?= $ms->category ?></td>
                    <td> <?= $ms->catatan ?></td>
                    <td> <?= rupiah($ms->jml_pengeluaran) ?></td>
                    <td> <?= rupiah($ms->jml_pemasukan) ?></td>
                    
                    </tr>
                    <?php endforeach ?>
                    <?php    
                        $total_kel = 0;
                        $total_msk = 0;
                    ?>
                    <?php foreach($datafilter as $no => $msk) :
                    ?>
                    <?php 
                        $total_kel += $msk->jml_pengeluaran;
                        $total_msk += $msk->jml_pemasukan;
                    ?>
                    <?php endforeach ?>
                    <tr>
                      <td></td>
                      <td colspan="3">Jumlah</td>
                      <td><?php echo rupiah($total_kel)?></td>
                      <td><?php echo rupiah($total_msk)?></td>
                    </tr>
                  
                  </tbody>
        </table>
    </body>
</html>
<?php 

date_default_timezone_set("Asia/Jakarta");

function tgl_indonesia($date){
    $Bulan = array("Januari","Februari","Maret","April",
                    "Mei","Juni","Juli","Agustus","September",
                    "Oktober","November","Desember");
    $Hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $hari = date("w", strtotime($date));
    return $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun."";
}

function rupiah($angka){
    if ($angka === "0"){
      $hasil_rupiah = "-";
    } else {
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    }
      return $hasil_rupiah;
   
  }

?>

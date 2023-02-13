<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body font-color">
              <h5 class="card-title font-color">Cetak Transaksi</h5>

              <!-- Browser Default Validation -->
              <form class="row g-3" method="post" action="<?php echo base_url('admin/Laporan/index') ?>">
                <div class="col-md-3">
                  <label class="form-label">Kategory</label>
                    <select class="form-select font-color" aria-label="Default select example" name="category" required>
                      <option value="">Pilih Kategori</option>
                      <?php foreach($kategory as $row):?>
                      <option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-3">
                  <label for="inputDate" class="form-label">Dari</label>
                    <input type="date" class="form-control font-color" name="tanggalawal" required>   
                </div>
                <div class="col-md-3">
                  <label for="inputDate" class="form-label">Sampai</label>
                    <input type="date" class="form-control font-color" name="tanggalakhir" required>
                </div>
                <div class="col-md-3 mt-5">
                      <button type="submit" class="btn font-white header-background">Cek</button>
                      <button class="btn font-white button-color" type="submit" name="submit">Cetak</button>  
                      <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
              <!-- End Browser Default Validation -->

            </div>
          </div>

        </div>
      </div>
    </section>



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Default Accordion -->
              <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button font-color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Lihat Transaksi
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show mt-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    
                  <table class="table datatable table-striped font-color">
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
                      <?php foreach($pengeluaran as $no => $kel) : ?>
                      <tr>
                      <td> <?= $no+1 ?></td>
                      <td> <?= tgl_indonesia($kel["create_at"]) ?></td>
                      <td> <?= $kel["category"] ?></td>
                      <td> <?= $kel["catatan"] ?></td>
                      <td> <?= rupiah($kel["jml_pengeluaran"]) ?></td>
                      <td> <?= rupiah($kel["jml_pemasukan"]) ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                  </div>
                </div>

                </div>
              </div><!-- End Default Accordion Example -->        
            </div>
          </div>

        </div>
      </div>
    </section>




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
    return $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ";
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

 






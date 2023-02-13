<section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

          <div class="card  font-color">
            <div class="card-body">
             
              <?=$this->session->flashdata("message")?>

              <!-- Create Data -->

              <button type="button" class="btn mb-3 mt-4 font-white header-background" data-bs-toggle="modal" data-bs-target="#basicModal">
                 Tambah Kategori
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <section class="section">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title font-color">Tambah Kategori</h5>
                                    <form action="<?= base_url('admin/Kategory/tambah_aksi') ?>" method="post">                                   
                                    <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="category">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                              <button class="btn font-white header-background" type="submit">Simpan</button>
                                        </div>
                                    </form>

                                  </div>
                              </div>
                            </div>
                          </div>
                        </section>
                    </div>
                  </div>
                </div>
              </div>

              <!-- End Create Data -->

              <!-- Table with stripped rows -->
              <table class="table datatable table-striped font-color">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                  </tr>
                </thead>  
                <tbody>
                  <?php foreach($kategory as $no => $msk) : ?>
                  <tr>
                  <td> <?= $no+1 ?></td>
                  <td> <?= $msk["category"] ?></td>
                  <td>
                    <button type="button" class="btn header-background font-white" data-bs-toggle="modal" data-bs-target="#edit<?= $msk["id_kel"]; ?>"><i class="ri ri-edit-2-line"></i></button>               
                    <a href="<?= base_url('admin/Kategory/delete/' . $msk["id_kel"]) ?>" type="button" class="btn font-white button-color" onclick="return confirm('Apakah anda yakin ingin mengapus?')"><i class="ri ri-delete-bin-6-line"></i></a>            
                  </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              
              <!-- End Table with stripped rows -->

              <!-- Update Data -->
            
              <?php foreach($kategory as $msk) : ?>
              <div class="modal fade" id="edit<?= $msk["id_kel"]; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Data Kategori</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="<?= base_url('admin/Kategory/update') ?>" method="POST">
                        <input type="hidden" name="id_kel" value="<?= $msk["id_kel"] ?>"> 
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jumlah Pemasukan</label>
                            <div class="col-sm-10">
                              <input type="text" name="category" class="form-control" value="<?= $msk["category"]; ?>">
                            </div>                
                          </div>
                          <div class="modal-footer">
                            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</a>
                            <button type="submit" class="btn font-white header-background">Simpan</button>
                          </div>
                          </form>  
                      </div>
                   </div>
                </div>
              </div>
              <?php endforeach ?>

              <!-- End Update Data -->

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
    return $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun."";
}


function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
 
?>





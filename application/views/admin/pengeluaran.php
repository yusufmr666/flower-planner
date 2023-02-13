<section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <?=$this->session->flashdata("message")?>

              <!-- Create Data -->

              <button type="button" class="btn mb-3 mt-4 font-white header-background" data-bs-toggle="modal" data-bs-target="#basicModal">
                Tambah Transaksi
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body font-color">
                    <section class="section">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title font-color">Tambah Transaksi</h5>
                                    <form action="<?= base_url('admin/Pengeluaran/tambah_aksi') ?>" method="post">  
                                        <div class="row mb-3">
                                          <label  for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                          <div class="col-sm-10">
                                            <input type="date" class="form-control" name="tanggal" required> 
                                          </div>
                                        </div>                                                          
                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label">Kategori</label>
                                          <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="category" required>
                                              <option value="">Pilih Kategori</option>
                                              <?php foreach($kategory as $row):?>
                                              <option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
                                              <?php endforeach;?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label">Jenis Transaksi</label>
                                          <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="tes" required>
                                              <option value="">Pilih Jenis</option>                                            
                                              <option value="1">Pengeluaran</option> 
                                              <option value="2">Pemasukan</option>                                          
                                            </select>
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="inputText" class="col-sm-2 col-form-label">Jumlah Transaksi</label>
                                          <div class="col-sm-10">
                                          <div class="input-group mb-3">
                                              <span class="input-group-text">Rp</span>
                                              <input type="number" name="jml_pengeluara" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                              <span class="input-group-text">.00</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="inputPassword" class="col-sm-2 col-form-label">Catatan</label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control" name="catatan" style="height: 100px"></textarea required>
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
              <table class="table datatable table-striped font-color ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Hari/Tanggal</th>
                    <th>Kategori</th>
                    <th>Catatan</th>
                    <th>Pengeluaran</th>
                    <th>Pemasukan</th>
                    <th>Aksi</th>
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
                  <td>                
                    <button type="button" class="btn header-background font-white" data-bs-toggle="modal" data-bs-target="#edit<?= $kel["id"]; ?>"><i class="ri ri-edit-2-line"></i></button>               
                    <a href="<?= base_url('admin/Pengeluaran/delete/' . $kel["id"]) ?>" type="button" class="btn font-white button-color" onclick="return confirm('Apakah anda yakin ingin mengapus?')"><i class="ri ri-delete-bin-6-line"></i></a>            
                  </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              
              <!-- End Table with stripped rows -->

              <!-- Detail Data -->
              <?php foreach($pengeluaran as $kel) : ?>
              <div class="modal fade" id="detail<?= $kel["id"]; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Detail Pengeluaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <section class="section">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-body">                
                                      <table class="table">
                                        <tr>
                                          <th width="20%">Hari/Tanggal</th>
                                          <td width="1%">:</td>
                                          <td><?= tgl_indonesia($kel["create_at"]) ?></td>
                                        </tr>
                                        <tr>
                                          <th>Kategori</th>
                                          <td>:</td>
                                          <td><?= $kel["category"] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Jumlah Pengeluaran</th>
                                          <td>:</td>
                                          <td><?= rupiah($kel["jml_pengeluaran"]) ?></td>
                                        </tr>
                                        <tr>
                                          <th>Catatan</th>
                                          <td>:</td>
                                          <td>
                                            <?= $kel["catatan"]?>
                                          </td>
                                        </tr>
                                      </table>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </section>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach ?>

              <!--  End Detail Data -->

              <!-- Update Data -->
            
              <?php foreach($pengeluaran as $kel) : ?>
              <div class="modal fade font-color" id="edit<?= $kel["id"]; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Data Transaksi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="<?= base_url('admin/Pengeluaran/update') ?>" method="POST"> 

                        <input type="hidden" name="id" value="<?= $kel["id"] ?>">

                        <?php $date = date("Y-m-d", strtotime($kel["create_at"]));?>
                        <div class="row mb-3">
                            <label  for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="tanggal" value="<?= $date ?>" required> 
                            </div>
                          </div> 

                          <input type="hidden" name="tes" class="form-control" value="<?= $kel["id_jenis"]; ?>">

                          <div class="row mb-3">

                              
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="category">
                         
                                    <?php foreach($kategory as $row):?>
                                      <option value="<?php echo $row->category ?>"
                                      <?php if($row->category==$kel["category"]) echo 'selected="selected"'; ?>><?php echo $row->category; ?></option>          
                                
                                    <?php endforeach;?>
                                  </select>
                                </div>
                              </div>
                                         
                          </div>
                          <?php   
                                $datas_pem = '';      
                                $datas = $kel["jml_pemasukan"];
                            
                                if($datas === "0"){
                                  $datas_pem = $kel["jml_pengeluaran"];
                                  
                                } else{
                                  $datas_pem = $kel["jml_pemasukan"];
                                }
                            ?>
                        
                          <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Transaksi</label>
                            <div class="col-sm-10">
                              <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="jml_pengeluaran" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?= $datas_pem ?>" required>
                                <span class="input-group-text">.00</span>
                              </div>                              
                            </div>                
                          </div>

                          <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                              <textarea type="text" name="catatan" class="form-control"><?= $kel["catatan"]; ?></textarea>
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





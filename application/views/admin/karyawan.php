<section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <?=$this->session->flashdata("message")?>

<!-- Create Data -->

                <button type="button" class="btn header-background font-white mb-3 mt-4 " data-bs-toggle="modal" data-bs-target="#basicModal">
                    Tambah Karyawan
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
                                <div class="card font-color">
                                    <div class="card-body">
                                    <h5 class="card-title font-color">Tambah Karyawan</h5>
                                
                                    <form action="<?= base_url('admin/Karyawan/tambah_aksi')?>" method="post">
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">No Telp</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_telp">
                                            </div>
                                        </div>   
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">Posisi</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="posisi">
                                            </div>
                                        </div>                                 
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                                <button class="btn header-background font-white" type="submit">Simpan</button>
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
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th> 
                    <th>Posisi</th> 
                    <th>Aksi</th>                
                    </tr>
                </thead>  
                <tbody>
                    <?php foreach($karyawan as $no => $usr) : ?>
                    <tr>
                    <td> <?= $no+1 ?></td>
                    <td> <?= $usr["nama"] ?></td>
                    <td> <?= $usr["alamat"] ?></td>
                    <td> <?= $usr["no_telp"] ?></td>  
                    <td> <?= $usr["posisi"] ?></td>  
                    <td>
                    <button type="button" class="btn header-background font-white" data-bs-toggle="modal" data-bs-target="#edit<?= $usr["id_kar"]; ?>"><i class="ri ri-edit-2-line"></i></button>               
                    <a href="<?= base_url('admin/Karyawan/delete/' . $usr["id_kar"]) ?>" type="button" class="btn button-color font-white" onclick="return confirm('Apakah anda yakin ingin mengapus?')"><i class="ri ri-delete-bin-6-line"></i></a>            
                    </td>                  
                    </tr>
                    <?php endforeach ?>
                </tbody>
                </table>

                <!-- End Table with stripped rows -->

            <?php foreach($karyawan as $kar) : ?>
              <div class="modal fade" id="edit<?= $kar["id_kar"]; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Karyawan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                       <div class="modal-body">
                        <form action="<?= base_url('admin/Karyawan/edit')?>" method="post">
                            <input type="hidden" name="id_kar" value="<?= $kar["id_kar"] ?>">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text" name="nama" v class="form-control" value="<?= $kar["nama"];?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                <textarea type="text" name="alamat" class="form-control"><?= $kar["alamat"];?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                <input type="text"  name="no_telp" class="form-control" value="<?= $kar["no_telp"];?>">
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Posisi</label>
                                <div class="col-sm-10">
                                <input type="text"  name="posisi" class="form-control" value="<?= $kar["posisi"];?>">
                                </div>
                            </div>                                 
                            <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</a>
                                    <button type="submit" class="btn font-white header-background" >Simpan</button>
                            </div>
                        </form>
                       </div>
                   </div>
                </div>
              </div>
              <?php endforeach ?>


                <!-- Update Data -->


<!-- End Update Data -->



            
            </div>
          </div>
        </div>
      </div>
    </section>

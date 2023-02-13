    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php    
                  $total_kel_hari = 0;
                  $total_kel_bulan = 0;
                  $total_kel = 0;
                  date_default_timezone_set('Asia/Jakarta');
                  $date = date('Y-m-d H:i:s');
              ?>
              <?php foreach($hari as $no => $msk) : ?>
                    <?php 
                        $total_kel_hari += $msk->jml_pengeluaran;
                    ?>
              <?php endforeach ?>
                <div class="card-body">
                  <h5 class="card-title font-color">Pengeluaran <span>| Hari ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart font-color"></i>
                    </div>
                    <div class="ps-3">
                    <span class="text small pt-1 fw-bold font-color"><?= tgl_indonesia($date)?></span> 
                      <h6 class="font-color"><?= rupiah($total_kel_hari) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php foreach($bulan as $no => $msk) : ?>
                    <?php 
                        $total_kel_bulan += $msk->jml_pengeluaran;
                    ?>
              <?php endforeach ?>

                <div class="card-body">
                  <h5 class="card-title font-color">Pengeluaran <span>| Bulan ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart font-color"></i>
                    </div>
                    <div class="ps-3">
                    <span class="text small pt-1 fw-bold font-color"><?= bulan_indonesia($date) ?></span>
                      <h6 class="font-color"><?= rupiah($total_kel_bulan) ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
            <?php foreach($total as $no => $msk) : ?>
                    <?php 
                        $total_kel += $msk->jml_pengeluaran;
                    ?>
              <?php endforeach ?>

              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title font-color">Pengeluaran <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart font-color"></i>
                    </div>
                    <div class="ps-3">
                    <span class="text font-color small pt-1 fw-bold">Total</span>
                      <h6><?= rupiah($total_kel) ?></h6>
                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Customers Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php    
                  $total_msk_hari = 0;
                  $total_msk_bulan = 0;
                  $total_msk = 0;
                  date_default_timezone_set('Asia/Jakarta');
                  $date = date('Y-m-d H:i:s');
              ?>
              <?php foreach($hari as $no => $msk) : ?>
                    <?php 
                        $total_msk_hari += $msk->jml_pemasukan;
                    ?>
              <?php endforeach ?>
                <div class="card-body">
                  <h5 class="card-title font-color">Pemasukan <span>| Hari ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar font-color"></i>
                    </div>
                    <div class="ps-3">
                    <span class="text font-color small pt-1 fw-bold"><?= tgl_indonesia($date)?></span> 
                      <h6><?= rupiah($total_msk_hari) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php foreach($bulan as $no => $msk) : ?>
                    <?php 
                        $total_msk_bulan += $msk->jml_pemasukan;
                    ?>
              <?php endforeach ?>

                <div class="card-body">
                  <h5 class="card-title  font-color">Pemasukan <span>| Bulan ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar font-color"></i>
                    </div>
                    <div class="ps-3">
                    <span class="text font-color small pt-1 fw-bold"><?= bulan_indonesia($date)  ?></span>
                      <h6><?= rupiah($total_msk_bulan) ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <?php foreach($total as $no => $msk) : ?>
                      <?php 
                          $total_msk += $msk->jml_pemasukan;
                      ?>
                <?php endforeach ?>

                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title font-color">Pemasukan <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar font-color"></i>
                      </div>
                      <div class="ps-3">
                      <span class="text font-color small pt-1 fw-bold">Total</span>
                        <h6><?= rupiah($total_msk) ?></h6>
                      </div>
                    </div>

                  </div>
                </div>
              </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->
    
          <div class="card">
            <div class="card-body">
        

              <h5 class="card-title font-color">Grafik Bulanan Tahun <?= thn_indonesia($date)?></h5>

              <!-- Column Chart -->
              <div id="columnChart"></div>
              <?php
                //Inisialisasi nilai variabel awal
                $nama_jurusan= "";
                $jumlah=null;
                foreach ($datafiltermsk as $item)
                {
                    $jur= bulan_indonesia($item->create_at);
                    $nama_jurusan .= "'$jur'". ", ";
                    $jum=$item->jumlah;
                    $jumlah .=  "$jum". ", ";
                }?>
                  <?php
                //Inisialisasi nilai variabel awal
                $nama_jurusan= "";
                $total=null;
                foreach ($datafiltermsk as $msk)
                {
                    $jur= bulan_indonesia($msk->create_at);
                    $nama_jurusan .= "'$jur'". ", ";
                    $tot=$msk->jumlah_msk;
                    $total .=  "$tot". ", ";
                }?>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#columnChart"), {
                    series: [{
                      name: 'Pengeluaran',
                      data: [<?php echo $jumlah; ?>]
                    }, {
                      name: 'Pemasukan',
                      data: [<?php echo $total; ?>]
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                      },
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      show: true,
                      width: 2,
                      colors: ['transparent']
                    },
                    xaxis: {
                      categories: [<?php echo $nama_jurusan; ?>],
                    },
                    yaxis: {
                      title: {
                        text: 'Rp. (thousands)'
                      }
                    },
                    fill: {
                      opacity: 1
                    },
                    tooltip: {
                      y: {
                        formatter: function(val) {
                          return "Rp. " + val + ""
                        }
                      }
                    }
                  }).render();
                });
              </script>
              <!-- End Column Chart -->

            </div>



              </div>
          </div>
        </div>

          
           
            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

<?php 

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

function bulan_indonesia($date){
  $Bulan = array("Januari","Februari","Maret","April",
                  "Mei","Juni","Juli","Agustus","September",
                  "Oktober","November","Desember");
  $bulan = substr($date, 5, 2);
  $tahun = substr($date, 0, 4);

  return $result = "".$Bulan[(int)$bulan-1]." ".$tahun." ";
}

function thn_indonesia($date){
  $tahun = substr($date, 0, 4);

  return $result = " ".$tahun." ";
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>

 
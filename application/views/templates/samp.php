<canvas id="lineChart" style="max-height: 400px;"></canvas>
<?php
                //Inisialisasi nilai variabel awal
                $nama_jurusan= "";
                $jumlah=null;
                foreach ($datafilter as $item)
                {
                    $jur= tgl_indonesia($item->create_at);
                    $nama_jurusan .= "'$jur'". ", ";
                    $jum=$item->jumlah;
                    $jumlah .=  "$jum". ", ";
                }?>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: [<?php echo $nama_jurusan; ?>],
                      datasets: [{
                        label: 'Line Chart',
                        data: [<?php echo $jumlah; ?>],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->
              <?php 
date_default_timezone_set("Asia/Jakarta");


function tgl_indonesia($date){
    $Bulan = array("Januari","Februari","Maret","April",
                    "Mei","Juni","Juli","Agustus","September",
                    "Oktober","November","Desember");
    $bulan = substr($date, 5, 2);

    return $result = "".$Bulan[(int)$bulan-1]."";
}

?>

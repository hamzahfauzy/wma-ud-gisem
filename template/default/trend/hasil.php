<?php 
$this->title .= " | Hasil Prediksi Penjualan"; 
$this->visited = "hasil";
$bulan = [
    "",
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
];
?>
<style>
.print-only{
    display: none;
}

@media print {
    .no-print {
        display: none;
    }

    .print-only{
        display: block;
    }
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hasil Prediksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Hasil Prediksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hasil Prediksi</h3>
                <br>
                <button class="btn btn-success no-print" onclick="window.print()"><i class="fa fa-print"></i> Cetak</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <center>
                  <h2 class="print-only">LAPORAN HASIL PREDIKSI</h2>
                </center>
                <table class="table table-bordered">
                  <tr>
                    <td>#</td>
                    <td>Bulan</td>
                    <td>Tahun</td>
                    <td>Jumlah</td>
                    <td>Forecasting</td>
                    <td>MAD</td>
                    <td>MSE</td>
                    <td>MAPE</td>
                  </tr>
                  <?php if(empty($trend)): ?>
                  <tr>
                    <td colspan="4"><i>Tidak ada data</i></td>
                  </tr>
                  <?php endif ?>
                  <?php 
                  $n = 1;
                  $last_bulan = 0; 
                  $last_tahun = 0; 
                  $last_aktual = []; 
                  $total_mad = 0;
                  $total_mse = 0;
                  $total_mape = 0;
                  foreach($trend as $key => $value): 
                    $last_bulan = $value->bulan; 
                    $last_tahun = $value->tahun;
                    $forecasting = 0;
                    $mad = 0;
                    $mape = 0;
                    $mse = 0;
                    if($n > 3)
                    {
                      $bobot = [1,2,3];
                      $total_bobot = 0;
                      $forecasting = 0;
                      foreach($last_aktual as $k => $v)
                      {
                        $forecasting += ($v*$bobot[$k]);
                        $total_bobot += $bobot[$k];
                      }

                      $forecasting = round($forecasting / $total_bobot, 1);

                      array_shift($last_aktual);
                      $mad = abs($value->jumlah-$forecasting);
                      $mse = ($value->jumlah-$forecasting)^2;
                      $mape = $mad/$value->jumlah*100;
                      $mape = round($mape,1);

                      $total_mad += $mad;
                      $total_mse += $mse;
                      $total_mape += $mape;
                    }
                    $last_aktual[] = $value->jumlah;
                    $n++; 
                  ?>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$bulan[$value->bulan]?></td>
                    <td><?=$value->tahun?></td>
                    <td><?=$value->jumlah?></td>
                    <td><?=$forecasting?></td>
                    <td><?=$mad?></td>
                    <td><?=$mse?></td>
                    <td><?=$mape?></td>
                  </tr>
                  <?php 
                  endforeach;
                  $bobot = [1,2,3];
                  $total_bobot = 0;
                  $forecasting = 0;
                  foreach($last_aktual as $k => $v)
                  {
                    $forecasting += ($v*$bobot[$k]);
                    $total_bobot += $bobot[$k];
                  }

                  $div_total = count($trend) - 3;
                  $forecasting = round($forecasting / $total_bobot, 1);
                  $total_mad = round($total_mad / $div_total, 1);
                  $total_mape = round($total_mape / $div_total, 1);
                  $total_mse = round($total_mse / $div_total, 1);
                  ?>
                  <tr>
                    <td><b>Periode Selanjutnya</b></td>
                    <td><?= $last_bulan == 12 ? $bulan[1] : $bulan[$last_bulan+1] ?></td>
                    <td><?= $last_bulan == 12 ? $last_tahun+1 : $last_tahun ?></td>
                    <td>-</td>
                    <td><?= $forecasting ?></td>
                    <td><?= $total_mad ?></td>
                    <td><?= $total_mse ?></td>
                    <td><?= $total_mape ?></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

</div>
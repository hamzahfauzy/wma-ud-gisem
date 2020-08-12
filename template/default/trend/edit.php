<?php 
$this->title .= " | Edit Trend Data Penjualan"; 
$this->visited = "trend";
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Trend Data Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>/trend">Trend Data Penjualan</a></li>
              <li class="breadcrumb-item active">Edit Trend Data</li>
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
                <h3 class="card-title">Edit Trend Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" class="col-lg-6 col-12">
                  <div class="form-group">
                    <label>Bulan</label>
                    <select class="form-control" name="bulan">
                      <?php foreach ($bulan as $key => $value) { ?>
                      <option value="<?= $key ?>" <?= $key == $trend->bulan ? 'selected=""' : '' ?>><?= $value ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" class="form-control" name="tahun" value="<?= $trend->tahun ?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value="<?= $trend->jumlah ?>">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                </form>
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
<?php 
$this->title .= " | Trend Data"; 
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
            <h1>Trend Data Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Trend Data Penjualan</li>
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
                <h3 class="card-title">Trend Data Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success"><?=session()->get('success')?></div>
                <?php session()->reset('success'); endif ?>
                <a href="<?=base_url()?>/trend/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                <p></p>
                <table class="table table-bordered">
                  <tr>
                    <td>No.</td>
                    <td>Bulan</td>
                    <td>Tahun</td>
                    <td>Jumlah</td>
                    <td>Aksi</td>
                  </tr>
                  <?php if(empty($trend)): ?>
                  <tr>
                    <td colspan="4"><i>Tidak ada data</i></td>
                  </tr>
                  <?php endif ?>
                  <?php foreach($trend as $key => $value): ?>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$bulan[$value->bulan]?></td>
                    <td><?=$value->tahun?></td>
                    <td><?=$value->jumlah?></td>
                    <td>
                      <a class="btn btn-primary" href="<?=base_url()?>/trend/edit/<?=$value->id?>"><i class="fa fa-pencil-alt fa-fw"></i> Edit</a>
                      <a class="btn btn-warning" href="<?=base_url()?>/trend/hapus/<?=$value->id?>"><i class="fa fa-trash-alt fa-fw"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach ?>
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
<?php 
$this->title .= " | Transaksi"; 
$this->visited = "transaksi";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
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
                <h3 class="card-title">Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success"><?=session()->get('success')?></div>
                <?php session()->reset('success'); endif ?>
                <a href="<?=base_url()?>/transaksi/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                <p></p>
                <table class="table table-bordered">
                  <tr>
                    <td>#</td>
                    <td>Pelanggan</td>
                    <td>Jumlah</td>
                    <td>Tanggal</td>
                    <td>Cetak</td>
                    <td>Aksi</td>
                  </tr>
                  <?php if(empty($transaksi)): ?>
                  <tr>
                    <td colspan="4"><i>Tidak ada data</i></td>
                  </tr>
                  <?php endif ?>
                  <?php foreach($transaksi as $key => $value): ?>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$value->pelanggan()->nama?></td>
                    <td><?=$value->jumlah?></td>
                    <td><?=$value->tanggal?></td>
                    <td>
                      <a class="btn btn-primary" href="<?=base_url()?>/transaksi/cetak/<?=$value->id?>"><i class="fa fa-print fa-fw"></i> Cetak Kwitansi</a>
                    </td>
                    <td>
                      <a href="<?=base_url()?>/transaksi/edit/<?=$value->id?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                      <a href="<?=base_url()?>/transaksi/hapus/<?=$value->id?>" class="btn btn-warning"><i class="fa fa-trash"></i> Hapus</a>
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
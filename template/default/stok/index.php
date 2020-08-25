<?php 
$this->title .= " | Stok"; 
$this->visited = "stok";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stok Batu (Sisa: <?= empty($stok) ? 0 : $stok[0]->sisa ?>)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Stok Batu</li>
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
                <h3 class="card-title">Stok Batu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success"><?=session()->get('success')?></div>
                <?php session()->reset('success'); endif ?>
                <a href="<?=base_url()?>/stok/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                <p></p>
                <table class="table table-bordered">
                  <tr>
                    <td>No.</td>
                    <td>Jumlah</td>
                    <td>Sisa</td>
                    <td>Keterangan</td>
                    <td>Tanggal</td>
                  </tr>
                  <?php if(empty($stok)): ?>
                  <tr>
                    <td colspan="5"><i>Tidak ada data</i></td>
                  </tr>
                  <?php endif ?>
                  <?php foreach($stok as $key => $value): ?>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$value->jumlah?></td>
                    <td><?=$value->sisa?></td>
                    <td><?=$value->keterangan?></td>
                    <td><?=$value->tanggal?></td>
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
<?php 
$this->title .= " | Edit Transaksi"; 
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
              <li class="breadcrumb-item"><a href="<?=base_url()?>/transaksi">Transaksi</a></li>
              <li class="breadcrumb-item active">Tambah Transaksi</li>
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
                <h3 class="card-title">Edit Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" class="col-lg-6 col-12">
                  <?php if(session()->get('success')): ?>
                  <div class="alert alert-success"><?=session()->get('success')?></div>
                  <?php session()->reset('success'); endif ?>
                  <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" value="<?=$transaksi->pelanggan()->nama?>" disabled="">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value="<?=$transaksi->jumlah?>">
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
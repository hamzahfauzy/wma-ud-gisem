<?php 
$this->title .= " | Edit Polsek"; 
$this->visited = "polsek";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Polsek</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>/admin/polsek">Data Polsek</a></li>
              <li class="breadcrumb-item active">Form Edit Data Polsek</li>
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
                <h3 class="card-title">Form Edit Data Polsek</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                    <?php if($msg): ?>
                    <div class="alert alert-success"><?= $msg ?></div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?=$data->nama?>" required>
                    </div>
                    <div class="form-group">
                        <label>Operator</label>
                        <select class="form-control" name="id_pengguna" required="">
                          <option value="">- Pilih -</option>
                          <?php foreach($users as $user){ ?>
                          <option value="<?=$user->id?>" <?=$data->id_pengguna==$user->id?'selected=""':''?>><?=$user->username?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
                    <a href="<?= base_url() ?>/admin/polsek" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
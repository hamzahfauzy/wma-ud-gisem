<?php 
$this->title .= " | Tambah Data Pengguna"; 
$this->visited = "pengguna";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>/admin/pengguna">Data Pengguna</a></li>
              <li class="breadcrumb-item active">Form Tambah Data Pengguna</li>
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
                <h3 class="card-title">Form Tambah Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                    <?php if($msg): ?>
                    <div class="alert alert-success"><?= $msg ?></div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" required="">
                          <option value=""></option>
                          <option value="admin">admin</option>
                          <option value="polsek">polsek</option>
                          <option value="kapolres">kapolres</option>
                        </select>
                    </div>
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url() ?>/admin/pengguna" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
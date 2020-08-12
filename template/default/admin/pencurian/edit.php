<?php 
$this->title .= " | Edit Pencurian"; 
$this->visited = "pencurian";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pencurian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>/admin/pencurian">Data Pencurian</a></li>
              <li class="breadcrumb-item active">Form Edit Data Pencurian</li>
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
                <h3 class="card-title">Form Edit Data Pencurian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                    <?php if($msg): ?>
                    <div class="alert alert-success"><?= $msg ?></div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Polsek</label>
                        <select name="id_polsek" class="select2" style="width: 100%;" required="">
                          <option value="">Pilih Polsek</option>
                          <?php foreach($polsek as $val): ?>
                          <option value="<?=$val->id?>" <?= $data->id_polsek == $val->id ? 'selected=""' : ''?>><?=$val->nama?></option>
                          <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" value="<?=$data->jumlah?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" value="<?=$data->tahun?>" class="form-control" required>
                    </div>
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
                    <a href="<?= base_url() ?>/admin/pencurian" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
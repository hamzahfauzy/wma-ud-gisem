<?php 
$this->title .= " | Pencurian"; 
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
              <li class="breadcrumb-item active">Data Pencurian</li>
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
                <h3 class="card-title">Data Pencurian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="<?=base_url()?>/admin/pencurian/tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                <p></p>
                <?php if($msg = session()->get('msg')): ?>
                <div class="alert alert-success"><?= $msg ?></div>
                <?php session()->reset('msg'); endif ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="20px">#</th>
                    <th>Polsek</th>
                    <th>Jumlah</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(empty($data)) : ?>
                    <tr>
                        <td colspan="5"><i>Tidak ada data!</i></td>
                    </tr>
                    <?php endif; $no = 1; ?>
                    <?php foreach($data as $value): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->polsek()->nama ?></td>
                        <td><?= $value->jumlah ?></td>
                        <td><?= $value->tahun ?></td>
                        <td>
                            <a href="<?= base_url() ?>/admin/pencurian/edit/<?=$value->id?>"><i class="fa fa-pencil-alt"></i> Edit</a>
                            |
                            <a href="<?= base_url() ?>/admin/pencurian/hapus/<?=$value->id?>" onclick="event.preventDefault(); var c=confirm('Apakah anda yakin akan menghapus data ini'); if(c) location=this.href"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="20px">#</th>
                    <th>Polsek</th>
                    <th>Jumlah</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
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
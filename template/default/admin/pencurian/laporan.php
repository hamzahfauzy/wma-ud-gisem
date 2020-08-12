<?php 
$this->title .= " | Laporan Pencurian"; 
$this->visited = "laporan-pencurian";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Laporan Pencurian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Data Laporan Pencurian</li>
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
                <h3 class="card-title">Data Laporan Pencurian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <a href="<?=base_url()?>/admin/pencurian/tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                <p></p>
                <?php if($msg = session()->get('msg')): ?>
                <div class="alert alert-success"><?= $msg ?></div>
                <?php session()->reset('msg'); endif ?> -->
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="20px">#</th>
                    <th>Polsek</th>
                    <th>No. Surat</th>
                    <th>Laporan</th>
                    <th>Cetak</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(empty($data)) : ?>
                    <tr>
                        <td colspan="4"><i>Tidak ada data!</i></td>
                    </tr>
                    <?php endif; $no = 1; ?>
                    <?php foreach($data as $value): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->polsek()->nama ?></td>
                        <td><?= $value->nomor_surat ?></td>
                        <td>
                          <?= $value->nama ?><br>
                          <?= $value->tanggal_melapor ?><br>
                          <b><?= $value->jenis_laporan ?></b><br>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>/admin/pencurian/cetak/<?=$value->id?>"><i class="fa fa-print"></i> Cetak</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="20px">#</th>
                    <th>Polsek</th>
                    <th>No. Surat</th>
                    <th>Laporan</th>
                    <th>Cetak</th>
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
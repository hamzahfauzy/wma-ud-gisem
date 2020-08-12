<?php 
use App\Models\Polsek;
$this->title .= " | Perhitungan"; 
$this->visited = "perhitungan";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhitungan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Perhitungan</li>
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
                <h3 class="card-title">Perhitungan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <label>Trend Data Pencurian</label>
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="20px">#</th>
                    <th>Polsek</th>
                    <?php for($i=2015;$i<=2019;$i++): ?>
                    <th><?=$i?></th>
                    <?php endfor ?>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(empty($polsek)) : ?>
                    <tr>
                        <td colspan="3"><i>Tidak ada data!</i></td>
                    </tr>
                    <?php endif; $no = 1; ?>
                    <?php foreach($polsek as $value): $pencurian = $value->trenPencurian(); ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->nama ?></td>
                        <?php foreach($pencurian as $p): ?>
                        <td><?=$p?></td>
                        <?php endforeach ?>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="20px">#</th>
                    <th>Polsek</th>
                    <?php for($i=2015;$i<=2019;$i++): ?>
                    <th><?=$i?></th>
                    <?php endfor ?>
                  </tr>
                  </tfoot>
                </table>
                <p></p>
                <form method="post">
                  <div class="form-group">
                    <label>Pilih Polsek sebagai Centroid Cluster</label>
                    <select name="id_polsek[]" class="select2" data-placeholder="Pilih Polsek" multiple="" style="width: 100%;" required="">
                      <?php foreach($polsek as $val): ?>
                      <option value="<?=$val->id?>" <?= isset($request->id_polsek) && in_array($val->id, $request->id_polsek) ? 'selected=""' : '' ?>><?=$val->nama?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <button class="btn btn-primary">Hitung</button>
                </form>

                <?php 
                if(isset($request->id_polsek)): 
                // print_r($centroid);
                $iterasi     = 0;
                $max_iterasi = 5;
                $run         = true;
                $all_result  = [];
                $rs          = [];
                $centroid    = [];
                $column      = [];
                while($max_iterasi--):
                  ?>
                  <label>Centroid</label>
                  <?php if(empty($centroid)): ?>
                  <table class="table table-bordered">
                    <?php 
                    foreach($request->id_polsek as $key => $id_polsek): 
                      $_polsek = Polsek::find($id_polsek);
                      $trenPencurian = $_polsek->trenPencurian();
                      // $arr    = ["id" => $id_polsek, "nama" => $polsek->nama];
                      // $arr    = array_merge($arr, $trenPencurian);
                      $centroid[$key] = $trenPencurian;
                    ?>
                    <tr>
                      <td>Centroid <?=++$key?></td>
                      <td>(<?=implode(',',$trenPencurian)?>)</td>
                    </tr>
                    <?php endforeach ?>
                  </table>
                  <?php else: ?>
                  <table class="table table-bordered">
                    <?php 
                    foreach($request->id_polsek as $key => $id_polsek): 
                      $trenPencurian = $centroid[$key];
                      // $arr    = ["id" => $id_polsek, "nama" => $polsek->nama];
                      // $arr    = array_merge($arr, $trenPencurian);
                      // $centroid[$key] = $trenPencurian;
                    ?>
                    <tr>
                      <td>Centroid <?=++$key?></td>
                      <td>(<?=implode(',',$trenPencurian)?>)</td>
                    </tr>
                    <?php endforeach ?>
                  </table>
                  <?php
                  endif;
                  $centroid_collection = [];
                  $nama_polsek = [];
                  foreach($polsek as $key => $value): 
                    $nama_polsek[] = $value->nama;
                    $pencurian = $value->trenPencurian();
                    // print_r($pencurian);
                    foreach($centroid as $k => $c)
                    {
                      $centroid_collection[$key][$k] = 0;
                      foreach($c as $k_c => $v_c)
                      {
                        // echo "(".$v_c."-".$pencurian[$k_c].")^2";
                        $pow = ($v_c - $pencurian[$k_c]);
                        $pow = $pow * $pow;
                        $centroid_collection[$key][$k] += $pow;
                        // if(next($c)) echo " + ";
                      }
                      // echo " = ";
                      // echo sqrt($centroid_collection[$key][$k]);
                      // echo "<br>";
                      $centroid_collection[$key][$k] = sqrt($centroid_collection[$key][$k]);
                      $centroid_collection[$key][$k] = is_nan($centroid_collection[$key][$k]) ? 0 : $centroid_collection[$key][$k];
                    }
                  endforeach;
                  ?>
                  <label>Iterasi Ke <?=$iterasi+1?></label>
                  <table class="table table-bordered">
                    <tr>
                      <td>Data</td>
                      <?php $no=1;  foreach($centroid_collection[0] as $key => $value): ?>
                      <td>C<?=$no++?></td>
                      <?php endforeach ?>
                    </tr>
                    <?php $no=1; $idx=0; foreach($centroid_collection as $key => $value): ?>
                    <tr>
                      <td><?=$no++?>. <?=$nama_polsek[$idx]?></td>
                      <?php foreach($value as $k => $v): ?>
                      <td><?=$v?></td>
                      <?php endforeach ?>
                    </tr>
                    <?php $idx++; endforeach ?>
                  </table>
                  <?php
                  $result = [];
                  $as = [];
                  $max_num = count($centroid_collection[0])-1;
                  for($i=count($centroid_collection[0])-1;$i>=0;$i--)
                  {
                    $as[] = $i;
                  }
                  foreach ($centroid_collection as $key => $value) {
                    asort($value);
                    $n=0;
                    foreach($value as $k => $v)
                    {
                      $result[$key][$k] = $as[$n];
                      $n++;
                    }
                    ksort($result[$key]);
                  }
                  ?>
                  <label>Pengelompokan Data</label>
                  <table class="table table-bordered">
                    <tr>
                      <td>Data</td>
                      <?php $no=1;  foreach($result[0] as $key => $value): ?>
                      <td>C<?=$no++?></td>
                      <?php endforeach ?>
                    </tr>
                    <?php $no=1; $idx=0; foreach($result as $key => $value): ?>
                    <tr>
                      <td><?=$no++?>. <?=$nama_polsek[$idx]?></td>
                      <?php foreach($value as $k => $v): ?>
                      <td><?=$v?></td>
                      <?php endforeach ?>
                    </tr>
                    <?php $idx++; endforeach ?>
                  </table>
                  <?php
                  if($iterasi == 0)
                  {
                    $all_result[$iterasi] = $result;
                    $iterasi++;
                    $h = [];
                    foreach($result[0] as $key => $value)
                    {
                      $c = array_column($result, $key);
                      $h[$key] = [];
                      foreach($c as $idx => $d)
                      {
                        if($d == $max_num) $h[$key][] = $idx;
                      }
                    }
                    $centroid = [];
                    $all_polsek = Polsek::get();
                    $col = 5;
                    foreach($h as $idx => $new_data) // idx as num of centroid
                    {
                      for($i=0;$i<$col;$i++){
                        $totalTren = 0;
                        foreach($new_data as $polsek_idx) // a centroid can be much of instances
                        {
                          $_polsek = $all_polsek[$polsek_idx];
                          $trenPencurian = $_polsek->trenPencurian();

                          $totalTren += $trenPencurian[$i];
                        }
                        $totalTren = $totalTren/count($new_data);
                        $centroid[$idx][$i] = $totalTren; 
                      }
                    }
                    // print_r($centroid);
                    // break;
                    // foreach($all_polsek as $key => $polsek): 
                    //   $trenPencurian = $polsek->trenPencurian();
                    //   foreach($trenPencurian as $k => $t)
                    //   {
                    //     $trenPencurian[$k] = $t/$h[$key];
                    //   }
                    //   // $arr    = ["id" => $id_polsek, "nama" => $polsek->nama];
                    //   // $arr    = array_merge($arr, $trenPencurian);
                    //   $centroid[$key] = $trenPencurian;
                    // endforeach;
                    $column = $h;
                    continue;
                  }
                  else
                  {
                    if($result === $all_result[$iterasi-1])
                    {
                      $rs = $result;
                      break;
                    }
                    $all_result[$iterasi] = $result;
                    $iterasi++;
                    $h = [];
                    foreach($result[0] as $key => $value)
                    {
                      $c = array_column($result, $key);
                      $h[$key] = [];
                      foreach($c as $idx => $d)
                      {
                        if($d == $max_num) $h[$key][] = $idx;
                      }
                    }
                    $centroid = [];
                    $all_polsek = Polsek::get();
                    $col = 5;
                    foreach($h as $idx => $new_data) // idx as num of centroid
                    {
                      for($i=0;$i<$col;$i++){
                        $totalTren = 0;
                        foreach($new_data as $polsek_idx) // a centroid can be much of instances
                        {
                          $_polsek = $all_polsek[$polsek_idx];
                          $trenPencurian = $_polsek->trenPencurian();

                          $totalTren += $trenPencurian[$i];
                        }
                        $totalTren = $totalTren/count($new_data);
                        $centroid[$idx][$i] = $totalTren; 
                      }
                    }
                    $column = $h;
                  }
                endwhile;
                ?>
                <?php endif ?>
                
                <br><br><br>
                <?php if(!empty($result)): ?>
                <?php foreach($column as $num => $col): ?>
                <p>
                  <b><?=++$num?>. Cluster <?=$num?> yaitu ada <?=count($col) ?> daerah sebagai berikut</b>:
                </p>
                <ul>
                <?php foreach ($col as $key => $value): ?>
                  <li><?=$polsek[$value]->nama?></li>
                <?php endforeach ?>
                </ul>
                <?php endforeach ?>
                <?php else: ?>
                <!-- <h2>Iterasi Maksimum, harap gunakan centroid yang lain</h2> -->
                <h2>Untuk melakukan perhitungan, harap pilih centroid terlebih dahulu</h2>
                <?php endif ?>

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
<?php 
$this->title .= " | Laporan Pencurian"; 
$this->visited = "laporan-pencurian";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<center>
		<h2 style="margin:0;padding:0;">KEPOLISIAN NEGARA REPUBLIK INDONESIA</h2>
		<h2 style="margin:0;padding:0;">RESOR ASAHAN</h2>
		<h2 style="margin:0;padding:0;">SEKTOR <?= $laporan->polsek()->nama?></h2>
		<hr>

		<img src="<?=base_url()?>/public/img/logo-polisi.png" width="100px" height="100px">
		<br>
		<p></p>
		<u>SURAT PENERIMAAN LAPORAN KEHILANGAN BARANG</u>
		<br>
		Nomor : <?= $laporan->nomor_surat ?>
	</center>
	<br><br>
	<p>Yang bertanda tangan dibawah ini menerangkan bahwa pada tanggal <?=$laporan->tanggal_melapor?> jam <?=$laporan->waktu_melapor?> telah datang ke Polsek <?= $laporan->polsek()->nama?> seorang warga negara Indonesia mengaku :</p>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?= $laporan->nama?></td>
		</tr>
		<tr>
			<td>Tempat, Tgl Lahir</td>
			<td>:</td>
			<td><?= $laporan->tempat_lahir?>, <?= $laporan->tanggal_lahir?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?= $laporan->agama?></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>:</td>
			<td><?= $laporan->pekerjaan?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?= $laporan->alamat?></td>
		</tr>
	</table>
	<br>
	<p>Mengatakan telah <?=$laporan->jenis_laporan?> :</p>
	<table>
		<?php foreach($laporan->meta() as $meta): ?>
		<tr>
			<td><?= $meta->meta_name?></td>
			<td>:</td>
			<td><?= $meta->meta_value?></td>
		</tr>
		<?php endforeach ?>
	</table>
	<br>
	<p>
		Sesuai dengan laporan/pengaduan dengan Nomor : <?=$laporan->nomor_surat?> tanggal <?=$laporan->tanggal_melapor?>.
		<br>
		Dengan demikian surat tanda penerima laporan/pengaduan tentang <?=$laporan->jenis_laporan?> ini dibuat agar dipergunakan seperlunya.
	</p>

	<br><br>

	PELAPOR
	<br><br><br>
	<b><?=$laporan->nama?></b>
</div>

<script type="text/javascript">
window.print()
</script>
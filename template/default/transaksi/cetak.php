<div style="width: 450px">
  <center>
  <h2 style="padding: 0;margin:0;">UD. GISEM</h2>
  <span>Desa Sumber Sari, Kecamatan Sei Balai, Kab. Batu bara</span>
  <hr>
  <h4>FAKTUR PEMBELIAN</h4>
  </center>
  <table>
    <tr>
      <td>Nama Kustomer</td>
      <td>:</td>
      <td><?=$transaksi->pelanggan()->nama?></td>
    </tr>
  </table>

  <table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
      <td>No</td>
      <td>Jumlah</td>
      <td>Sub Total</td>
    </tr>
    <tr>
      <td>1</td>
      <td><?=$transaksi->jumlah?></td>
      <td>Rp. <?=number_format($transaksi->jumlah*310)?></td>
    </tr>
    <?php for($i=0;$i<4;$i++): ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php endfor ?>
    <tr>
      <td>&nbsp;</td>
      <td><b>Total</b></td>
      <td>Rp. <?=number_format($transaksi->jumlah*310)?></td>
    </tr>
  </table>

  <br><br>
  <span>Sumber Sari, <?=date('d M Y',strtotime($transaksi->tanggal))?></span><br>
  <b>Diketahui</b>
  <br><br><br><br>
  <b>GISEM</b>
</div>
<script type="text/javascript">
window.print()
</script>
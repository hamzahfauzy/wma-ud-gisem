<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <link href="<?= asset('css/bootstrap.min.css') ?>" type="text/css" rel="stylesheet"/>
    
    <!-- Font Awesome -->
	<link rel="stylesheet" href="<?= asset('plugins/fontawesome-free/css/all.min.css')?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?=asset('plugins/select2/css/select2.min.css')?>">
	<link rel="stylesheet" href="<?=asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
	
	<link rel="stylesheet" href="<?= asset('css/adminlte.min.css') ?>">
	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="<?= asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  	<!-- DataTables -->
	<link rel="stylesheet" href="<?=asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?=asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
    <!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <?php foreach($this->css as $css): ?>
    <link href="<?= $css ?>" type="text/css" rel="stylesheet"/>
    <?php endforeach; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php require "layouts/header.php" ?>
		<?php require "layouts/sidebar.php" ?>
		<?= $content; ?>
		<?php require "layouts/footer.php" ?>
	</div>
	<!-- jQuery -->
	<script src="<?=asset('plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=asset('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
	<!-- Select2 -->
	<script src="<?=asset('plugins/select2/js/select2.full.min.js')?>"></script>
	<!-- overlayScrollbars -->
	<script src="<?=asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
	<!-- AdminLTE App -->
	<script src="<?=asset('js/adminlte.js')?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?=asset('js/pages/dashboard.js')?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=asset('js/demo.js')?>"></script>

	<!-- DataTables -->
	<script src="<?=asset('plugins/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?=asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
	<script src="<?=asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>

	<?php foreach($this->js as $js): ?>
	<script src="<?= $js ?>"></script>
	<?php endforeach; ?>
	<script>
	  $(function () {
	    $("#example2").DataTable({
	      "responsive": true,
	      "autoWidth": false,
	    });
	  });
	  $('.select2').select2()
	</script>
</body>
</html>
<?php
include 'config/koneksi.php';
include 'auth/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SPPD</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<?php include 'inc/navbar.php'; ?>

		<!-- Sidebar -->
		<?php include 'inc/sidebar.php'; ?>
		<!-- End Sidebar -->

		<?php
		if (isset($_GET['page']))
		{
			$page = $_GET['page'];

			if ($page == 'nppd') {
				include 'pages/nppd/index.php';
			}
			if ($page == 'tambah-nppd') {
				include 'pages/nppd/create.php';
			}
			if ($page == 'edit-nppd') {
				include 'pages/nppd/edit.php';
			}
			if ($page == 'pegawai') {
				include 'pages/pegawai/index.php';
			}
			if ($page == 'tambah-pegawai') {
				include 'pages/pegawai/create.php';
			}
			if ($page == 'edit-pegawai') {
				include 'pages/pegawai/edit.php';
			}
			if ($page == 'golongan') {
				include 'pages/golongan/index.php';
			}
			if ($page == 'tambah-golongan') {
				include 'pages/golongan/create.php';
			}
			if ($page == 'edit-golongan') {
				include 'pages/golongan/edit.php';
			}
			if ($page == 'kota') {
				include 'pages/kota/index.php';
			}
			if ($page == 'tambah-kota') {
				include 'pages/kota/create.php';
			}
			if ($page == 'edit-kota') {
				include 'pages/kota/edit.php';
			}
			if ($page == 'biaya-perjalanan') {
				include 'pages/biaya-perjalanan/index.php';
			}
			if ($page == 'tambah-biaya-perjalanan') {
				include 'pages/biaya-perjalanan/create.php';
			}
			if ($page == 'edit-biaya-perjalanan') {
				include 'pages/biaya-perjalanan/edit.php';
			}
			if ($page == 'kendaraan') {
				include 'pages/kendaraan/index.php';
			}
			if ($page == 'tambah-kendaraan') {
				include 'pages/kendaraan/create.php';
			}
			if ($page == 'edit-kendaraan') {
				include 'pages/kendaraan/edit.php';
			}
			if ($page == 'profil-instansi') {
				include 'pages/instansi/index.php';
			}
			if ($page == 'ttd-kuitansi') {
				include 'pages/ttd-kuitansi/index.php';
			}
			if ($page == 'spt') {
				include 'pages/spt/index.php';
			}
			if ($page == 'edit-spt') {
				include 'pages/spt/edit.php';
			}
			if ($page == 'sppd') {
				include 'pages/sppd/index.php';
			}
			if ($page == 'tambah-sppd') {
				include 'pages/sppd/create.php';
			}
			if ($page == 'edit-sppd') {
				include 'pages/sppd/edit.php';
			}
			if ($page == 'kuitansi') {
				include 'pages/kuitansi/index.php';
			}
			if ($page == 'tambah-kuitansi') {
				include 'pages/kuitansi/create.php';
			}
			if ($page == 'edit-kuitansi') {
				include 'pages/kuitansi/edit.php';
			}
			if ($page == 'perjalanan-dinas') {
				include 'pages/perjalanan-dinas/index.php';
			}
			if ($page == 'tambah-perjalanan-dinas') {
				include 'pages/perjalanan-dinas/create.php';
			}
			if ($page == 'ubah-password') {
				include 'pages/ubah-password/index.php';
			}
		}
		else
		{
			include 'pages/dashboard.php';
		}
		?>
	</div>
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Select2 -->
<script src="assets/js/plugin/select2/js/select2.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<script >
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});
	});
</script>
<script>
	$(document).ready(function() {
    	$('.select2').select2({
			placeholder: 'Pilih Pegawai',
			allowClear: true
		});
	});
</script>
<script>
	$("#tanggal_pulang, #tanggal_pergi").change(function() {
		const startDate = new Date($("#tanggal_pergi").val());
		const endDate = new Date($("#tanggal_pulang").val());

		if (endDate < startDate) {
			alert("Tanggal pulang tidak boleh sebelum tanggal pergi !");
			$("#tanggal_pulang").val("");
		}

		const diffTime = Math.abs(endDate - startDate);
		const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
		$("#lama_perjalanan").val(diffDays + 1);
	});
</script>
<script src="inc/js/edit-button.js"></script>
<script src="inc/js/total.js"></script>
<script src="inc/js/confirm-password.js"></script>
</body>
</html>
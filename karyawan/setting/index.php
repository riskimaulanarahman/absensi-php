<?php 

session_start();
if( !isset($_SESSION["id"]) ) 
	echo "<script>
        alert('Anda Harus Login Terlebih Dahulu');
        window.location = '../../'
      </script>
      ";;

//manggil koneksi
require '../../config/koneksi.php';

//ambil id
$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
$result = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Absensi Karyawan | Pengaturan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	    <!-- Left navbar links -->
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	      </li>
	      <li class="nav-item d-none d-sm-inline-block">
	        <a href="../../karyawan" class="nav-link">Home</a>
	      </li>
	    </ul>
	</nav>
	<!-- /.navbar -->

  	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
	    <!-- Brand Logo -->
	    <a href="../../karyawan" class="brand-link">
	    	<i class="fas fa-clipboard-list mr-3 ml-4"></i>
	     	<span class="brand-text font-weight-light">Absensi Karyawan</span>
	    </a>

	    <!-- Sidebar -->
	    <div class="sidebar">

	      	<!-- Sidebar Menu -->
	      	<nav class="mt-2">
	        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	          	<!-- Add icons to the links using the .nav-icon class
	               with font-awesome or any other icon font library -->
	          		<li class="nav-item">
	            		<a href="../../karyawan" class="nav-link">
	              			<i class="nav-icon fas fa-tachometer-alt"></i>
	              			<p>
	                			Dashboard
	              			</p>
	            		</a>
	          		</li>
	          		<li class="nav-item">
	            		<a href="../setting" class="nav-link">
	            			<i class="fas fa-cogs nav-icon""></i>
							<p><?= $result['nama'] ?></p>
	            		</a>
	          		</li>
					<li class="nav-item">
	            		<a href="../../logout.php" class="nav-link">
							<i class="fas fa-sign-out-alt nav-icon"></i>
							<p>Logout</p>
						</a>
	          		</li>      
	        	</ul>
	      	</nav>
	      <!-- /.sidebar-menu -->
	    </div>
	    <!-- /.sidebar -->
  	</aside>

  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<div class="content-header">
      		<div class="container-fluid">
        		<div class="row">
          			<div class="col-sm-6">
            			<h1 class="m-0 text-dark"><i class="fas fa-cogs mr-3"></i>Pengaturan Admin</h1>
          			</div><!-- /.col -->
	          		<div class="col-sm-6">
	        	    	<ol class="breadcrumb float-sm-right">
	            	  		<li class="breadcrumb-item"><a href="../../karyawan">Karyawan</a></li>
	              			<li class="breadcrumb-item active">Pengaturan</li>
	            		</ol>
	          		</div><!-- /.col -->
	        	</div><!-- /.row -->
	      	</div><!-- /.container-fluid -->
	    </div>
    	<!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
	        	<div class="content-header">
					<div class="alert alert-success">
						<i class="fas fa-cogs mr-1"></i>
						Form Pengaturan Admin
					</div>
				</div>
				<div class="content-main">
					<div class="col-sm-4 float-left">
						<form class="text-center" action="editgambar.php" method="post" enctype="multipart/form-data">
							<img src="../../assets/profil/<?= $result['photo'] ?>" class="mb-2" style="width: 70%">
					        <br>
							<input type="file" id="gambar" name="gambar">
							<p><button class="btn btn-primary mt-2 mb-2" type="submit" name="gantiGambar">Ganti Gambar</button></p>
						</form>
					</div>
					<div class="col-sm-8 float-left border-left border-danger">
						<form action="editdata.php" method="post">
							<div class="col-sm-6 float-left">
								<div class="form-group">
									<label>NIDN</label>
									<input type="text" name="nidn" class="form-control" value="<?= $result['nidn'] ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control" value="<?= $result['tgl_lahir'] ?>">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" name="alamat" class="form-control" value="<?= $result['alamat'] ?>">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" value="<?= $result['username'] ?>">
								</div>
							</div>
							<div class="col-sm-6 float-left">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" value="<?= $result['nama'] ?>">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jenis_kelamin">
										<option value="Perempuan" <?= $result['jenis_kelamin'] == 'Perempuan' ? 'selected="selected"' : '' ?>>Perempuan</option>
										<option value="Laki - Laki" <?= $result['jenis_kelamin'] == 'Laki - Laki' ? 'selected="selected"' : '' ?>>Laki - Laki</option>
									</select>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="<?= $result['email'] ?>">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" value="<?= $result['password'] ?>">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="text-center">
								<button class="btn btn-success" name="edit">Save Change</button>
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
	    	</div>
	    	<!-- /.container-fluid -->
	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<strong>Copyright &copy; 2022 </strong>
		Absensi Karyawan
	</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../assets/vendor/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../assets/vendor/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../assets/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="../../assets/vendor/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../assets/vendor/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../assets/vendor/moment/moment.min.js"></script>
<script src="../../assets/vendor/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../assets/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
</body>
</html>

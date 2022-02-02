<?php

session_start();
if( !isset($_SESSION["id"]) ) 
	echo "<script>
        alert('Anda Harus Login Terlebih Dahulu');
        window.location = '../'
      </script>
      ";;

//manggil koneksi
require '../config/koneksi.php';

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
  <title>Absensi Karyawan | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
	        <a href="../karyawan" class="nav-link">Home</a>
	      </li>
	    </ul>
	</nav>
	<!-- /.navbar -->

  	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
	    <!-- Brand Logo -->
	    <a href="../karyawan" class="brand-link">
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
	            		<a href="" class="nav-link active">
	              			<i class="nav-icon fas fa-tachometer-alt"></i>
	              			<p>
	                			Dashboard
	              			</p>
	            		</a>
	          		</li>
					<li class="nav-item">
	            		<a href="setting" class="nav-link">
	            			<i class="fas fa-cogs nav-icon""></i>
							<p><?= $result['nama'] ?></p>
	            		</a>
	          		</li>
					<li class="nav-item">
	            		<a href="../logout.php" class="nav-link">
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
        		<div class="row mb-2">
          			<div class="col-sm-6">
            			<h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard My Absensi</h1>
          			</div><!-- /.col -->
	          		<div class="col-sm-6">
	        	    	<ol class="breadcrumb float-sm-right">
	            	  		<li class="breadcrumb-item"><a href="#">Karyawan</a></li>
	              			<li class="breadcrumb-item active">Dashboard</li>
	            		</ol>
	          		</div><!-- /.col -->
	        	</div><!-- /.row -->
	      	</div><!-- /.container-fluid -->
	    </div>
    	<!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
	        	<!-- Small boxes (Stat box) -->
	        	<div class="row">
	          		<div class="col-md-12">
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="myabsensi" width="100%">
							<thead>
								<tr>
									<th>rfid</th>
									<th>nama</th>
									<th>nidn</th>
									<th>tanggal</th>
									<th>jam_masuk</th>
									<th>jam_istirahat</th>
									<th>jam_kembali</th>
									<th>jam_pulang</th>
									<th>kegiatan</th>
								</tr>
							</thead>
							<tbody id="bmyabsensi">

							</tbody>
						</table>
					</div>
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
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/moment-2.18.1/dt-1.11.4/b-2.2.2/date-1.1.1/sl-1.3.4/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../assets/datatables/css/generator-base.css">
<link rel="stylesheet" type="text/css" href="../assets/datatables/css/editor.dataTables.min.css">

<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/moment-2.18.1/dt-1.11.4/b-2.2.2/date-1.1.1/sl-1.3.4/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../assets/datatables/js/dataTables.editor.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$('#myabsensi').DataTable();

	$('#bmyabsensi').html('')

	var url = "../api.php?case=myabsensi";
	$.getJSON(url,function(item){
		$.each(item.data,function(x,y){
			$('#bmyabsensi').append('<tr><td>'+y.rfid+'</td><td>'+y.nama+'</td><td>'+y.nidn+'</td><td>'+y.tanggal+'</td><td>'+y.jam_masuk+'</td><td>'+y.jam_istirahat+'</td><td>'+y.jam_kembali+'</td><td>'+y.jam_pulang+'</td><td>'+y.kegiatan+'</td></tr>')
		})
	})

</script>
</body>
</html>

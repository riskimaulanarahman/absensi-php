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

  <!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx.light.css">
 
    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/21.2.5/js/dx.all.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/moment-2.18.1/dt-1.11.4/b-2.2.2/date-1.1.1/sl-1.3.4/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../assets/datatables/css/generator-base.css">
<link rel="stylesheet" type="text/css" href="../assets/datatables/css/editor.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/moment-2.18.1/dt-1.11.4/b-2.2.2/date-1.1.1/sl-1.3.4/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../assets/datatables/js/dataTables.editor.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<!-- <script type="text/javascript" charset="utf-8" src="../assets/datatables/js/dataTables.editor.min.js"></script> -->

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
	        <a href="../admin" class="nav-link">Home</a>
	      </li>
	    </ul>
	</nav>
	<!-- /.navbar -->

  	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
	    <!-- Brand Logo -->
	    <a href="index.php?page=dashboardadmin" class="brand-link">
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
	            		<a href="index.php?page=dashboardadmin" class="nav-link">
	              			<i class="nav-icon fas fa-tachometer-alt"></i>
	              			<p>
	                			Dashboard
	              			</p>
	            		</a>
	          		</li>
	          		<li class="nav-item">
	            		<a href="index.php?page=absensikaryawan" class="nav-link">
	              			<i class="nav-icon fas fa-address-card"></i>
	              			<p>
	                			Absensi Karyawan
	              			</p>
	            		</a>
	          		</li>
	          		<li class="nav-item">
	            		<a href="index.php?page=datakaryawan" class="nav-link">
	              			<i class="nav-icon fas fa-user-tie"></i>
	              			<p>
	                			Data Karyawan
	              			</p>
	            		</a>
	          		</li>
	          		<li class="nav-item">
	            		<a href="index.php?page=rekapabsensi" class="nav-link">
	            			<i class="nav-icon fas fa-chalkboard-teacher"></i>
	              			<p>
	                			Rekapitulasi Absensi
	              			</p>
	            		</a>
	          		</li>
	          		<li class="nav-item has-treeview">
	            		<a href="#" class="nav-link">
	              			<i class="nav-icon fas fa-user-cog"></i>
	              			<p>
	                			User
	                			<i class="right fas fa-angle-right"></i>
	              			</p>
	            		</a>
	            		<ul class="nav nav-treeview">
	              			<li class="nav-item">
	                			<a href="../logout.php" class="nav-link">
	                  				<i class="fas fa-sign-out-alt nav-icon"></i>
	                  				<p>Logout</p>
	                			</a>
	              			</li>
	            		</ul>
	          		</li>        
	        	</ul>
	      	</nav>
	      <!-- /.sidebar-menu -->
	    </div>
	    <!-- /.sidebar -->
		<!-- Content Wrapper. Contains page content -->
</aside>
<div class="content-wrapper">
<?php 

$username = $_SESSION['username'];
$id     = $_SESSION['id'];

	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'dashboardadmin':
                include "../admin/dashboardadmin.php";
				break;
			case 'absensikaryawan':
				include "../admin/absensi/index.php";
				break;	
            case 'rekapabsensi':
                include "../admin/rekap-absen/index.php";
				break;
			case 'datakaryawan':
				include "../admin/data-karyawan/index.php";
				break;		
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		// include "home.php";
		include "../admin/dashboardadmin.php";

        // echo "Selamat Datang $email ($username) ";
	}
 


?>
	</div>
	<!-- /.content-wrapper -->
  

  	
	<footer class="main-footer">
		<strong>Copyright &copy; 2022 </strong>
		Absensi Karyawan
	</footer>
</div>
<!-- ./wrapper -->


<script>
//   $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>


</body>
</html>

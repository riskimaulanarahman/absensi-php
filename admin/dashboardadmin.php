
    	<!-- Content Header (Page header) -->
    	<div class="content-header">
      		<div class="container-fluid">
        		<div class="row mb-2">
          			<div class="col-sm-6">
            			<h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</h1>
          			</div><!-- /.col -->
	          		<div class="col-sm-6">
	        	    	<!-- <ol class="breadcrumb float-sm-right">
	            	  		<li class="breadcrumb-item"><a href="#">Admin</a></li>
	              			<li class="breadcrumb-item active">Dashboard</li>
	            		</ol> -->
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
	          		<div class="col-lg-4 col-4">
	            	<!-- small box -->
	            		<div class="small-box bg-info">
	              			<div class="inner">
	                			<h4><strong>Data Karyawan</strong></h4>
	                			<p>Lihat Data Karyawan</p>
	              			</div>
	              			<div class="icon">
	                			<i class="ion ion-bag"></i>
	              			</div>
	              			<a href="index.php?page=datakaryawan" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
	            		</div>
	          		</div>

	          		<div class="col-lg-4 col-4">
	            		<!-- small box -->
	            		<div class="small-box bg-success">
	              			<div class="inner">
	                			<h4><strong>Record Harian</strong></h4>
	                			<p>Lihat Data Record</p>
	              			</div>
		              		<div class="icon">
		                		<i class="ion ion-bag"></i>
		              		</div>
		              		<a href="index.php?page=absensikaryawan" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
		            	</div>
		          	</div>

	          		<div class="col-lg-4 col-4">
	            		<!-- small box -->
	            		<div class="small-box bg-warning">
	              			<div class="inner">
	                			<h4><strong>Rekapitulasi</strong></h4>
	                			<p>Lihat Rekapitulasi</p>
	              			</div>
		              		<div class="icon">
		                		<i class="ion ion-bag"></i>
		              		</div>
		              		<a href="index.php?page=rekapabsensi" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
		            	</div>
		          	</div>
		        </div>
	    	</div>
	    	<!-- /.container-fluid -->
			<div class="col-md-6">
				<label for="liststatus">Change Status Absensi</label>
				<div class="form-inline">
					<select class="form-control" id="liststatus" style="margin-right:5px;">
						<option value="">- Select Status -</option>
						<option value="1">Jam Masuk</option>
						<option value="2">Jam Istirahat</option>
						<option value="3">Jam Kembali</option>
						<option value="4">Jam Pulang</option>
					</select>
					
					<button id="btnstatus" class="btn btn-danger">Submit</button>
				</div>
			</div>

	    </section>
	    <!-- /.content -->

		<script>
			$('#btnstatus').click(function() {
				var value = $('#liststatus').val();
				var url = "../api.php?case=settingabsensi&status="+value;

				if(value == null || value == '') {
					alert('Select Status Required')
				} else {
					$.getJSON(url,function(item){
						if(item.status == 200) {
							alert('Berhasil Ubah Status')
						} else {
							alert('Gagal Ubah Status')
						}
					})
				}

			})
		</script>

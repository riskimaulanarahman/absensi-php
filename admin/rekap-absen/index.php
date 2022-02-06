    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><i class="fas fa-chalkboard-teacher mr-3"></i>Rekapitulasi Absensi Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../../admin">Admin</a></li>
                  <li class="breadcrumb-item active">Rekapitulasi Absensi</li>
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
            <i class="fas fa-chalkboard-teacher mr-1"></i>
            Form Rekapitulasi Absensi Karyawan
          </div>
        </div>
        <div class="content-main">
          <!-- <form method="get" class="mb-2" name="form_cek" id="form_cek"> -->
            <div class="form-group text-center">
              <label>Filter Berdasarkan Periode</label><br>
              <input type="text" name="" class="form-control col-1 float-left" readonly="" placeholder="Tahun">
              <!-- <input type="date" name="dari" class="form-control col-2 float-left"> -->
              <select class="form-control col-2 float-left" name="" id="optahun">
                <option value="">- Select Tahun -</option>
                <option value="2022">2022</option>
                <option value="2023">2022</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
              <input type="text" name="" class="form-control col-1 float-left" readonly="" placeholder="Bulan">
              <select class="form-control col-2 float-left" name="" id="opbulan">
                <option value="">- Select Bulan -</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <input type="text" name="" class="form-control col-1 float-left" readonly="">
              <button class="btn btn-info float-left col-1" id="btnfilter">
                <i class="fas fa-download mr-2"></i> Filter
              </button>
              <input type="text" name="" class="form-control col-4 float-left" readonly="">
              <div class="clearfix"></div>
            </div>
          <!-- </form> -->
          <table class="table table-striped table-hover table-bordered" id="rekapabsen">
            <thead>
              <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama User</th>
                <th>Total Kehadiran</th>
                <!-- <th>Persentase Kehadiran</th> -->
                <th>Total Ketidakhadiran</th>
              </tr>
            </thead>
            <!-- <tbody id="brekapabsen">

            </tbody> -->
          </table>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
	


  var d = new Date(),

    n = d.getMonth()+1,

    y = d.getFullYear();

    // console.log(d)
    // console.log(y)
    // console.log(n)
  
  var table = $('#rekapabsen').DataTable( {
      dom: 'Bfrti',
      "processing": true,
      "serverSide": true,
      "ajax": "../api.php?case=rekapabsensi&tahun="+y+"&bulan="+n,
      "columns": [
            { "data": "rfid" },
            { "data": "nidn" },
            { "data": "nama" },
            { "data": "total_kehadiran" },
            // { "data": "presentase_kehadiran" },
            { "data": "total_ketidakhadiran" }
        ],
      buttons: [
          // 'copy', 'csv', 'excel', 'print'
          {
                extend: 'excel',
                title: 'Rekap Absensi '+y+'-'+n
          },
      ]
  } );
    
  // $('#brekapabsen').html('')
	// var url = "../api.php?case=rekapabsensi&tahun="+y+"&bulan="+n;
	// $.getJSON(url,function(item){
  //   var i = 1;
	// 	$.each(item.data,function(x,y){
	// 		$('#brekapabsen').append('<tr><td>'+i+++'</td><td>'+y.rfid+'</td><td>'+y.nama+'</td><td>'+y.total_kehadiran+'</td><td>'+y.presentase_kehadiran+'</td><td>'+y.total_ketidakhadiran+'</td></tr>')
	// 	})
	// })

  $('#btnfilter').click(function(){
    var tahun = $('#optahun').val();
    var bulan = $('#opbulan').val();
    if((tahun == null || tahun == '') || (bulan==null || bulan == '')) {
      alert('Tahun atau Bulan Harus Di isi')
    } else {
      table.destroy();

      table = $('#rekapabsen').DataTable( {
            dom: 'Bfrti',
            "processing": true,
            "serverSide": true,
            "ajax": "../api.php?case=rekapabsensi&tahun="+tahun+"&bulan="+bulan,
            "columns": [
                  { "data": "rfid" },
                  { "data": "nidn" },
                  { "data": "nama" },
                  { "data": "total_kehadiran" },
                  // { "data": "presentase_kehadiran" },
                  { "data": "total_ketidakhadiran" }
              ],
            buttons: [
                // 'copy', 'csv', 'excel', 'print'
                {
                      extend: 'excel',
                      title: 'Rekap Absensi '+tahun+'-'+bulan
                },
            ]
        } );
    // $('#brekapabsen').html('')
    //   var url = "../api.php?case=rekapabsensi&tahun="+tahun+"&bulan="+bulan;
    //   $.getJSON(url,function(item){
    //     var i = 1;
    //     $.each(item.data,function(x,y){
    //       $('#brekapabsen').append('<tr><td>'+i+++'</td><td>'+y.rfid+'</td><td>'+y.nama+'</td><td>'+y.total_kehadiran+'</td><td>'+y.presentase_kehadiran+'</td><td>'+y.total_ketidakhadiran+'</td></tr>')
    //     })

    //   })
    }
  })

</script>

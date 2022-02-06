<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Fontawesome -->
  <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css"> -->

  <title>Absensi Karyawan | Login</title>
</head>

<body class="bg-dark">
  <div class="row mb-5">
    <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 p-2 h1">Absensi Karyawan</span>
      <div class="form-group">
        <button id="btnlogin" class="btn btn-outline-success my-2 my-sm-0" style="margin-right:6px"
          type="submit">Login</button>
        <button id="btnabsen" class="btn btn-outline-danger my-2 my-sm-0" style="margin-right:6px"
          type="submit">Absen</button>
      </div>
    </nav>
  </div>
  <div class="container" id="divlogin" hidden><br><br><br><br><br>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="row">
          <div class="col-lg-12 bg-white" style="font-family: arial">
            <div class="p-3">
              <div>
                <form method="post" action="login.php">
                  <div class="form-header mt-3 text-dark">
                    <!-- <h2 id="flashdata">
                        
                      </h2> -->
                    <!-- <br> -->
                    <h2>Login</h2>
                    <hr style="color: blue; height: 2px">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="Username">
                  </div>
                  <div class="form-group mt-3">
                    <label for="username">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="Password">
                  </div>
                  <hr style="color: blue; height: 2px">
                  <!-- <a href="#">Lupa Password</a><br> -->
                  <button class="btn btn-primary btn-user btn-block mt-1" name="login">Masuk</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" id="divabsen">
    <div class="card">
      <div class="card-header">
        <div class="error-message" id="datetime"></div>
        <hr>
        <input type="hidden" id="idstatus">
        Status : <b class="cekstatus">Jam ?</b>
      </div>
      <div class="card-body">
        <!-- <form> -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" pattern="\d*" id="inputrfid" min="0" maxlength="6" placeholder="">
            <label for="inputrfid">RF ID</label>
          </div>
          <div class="form-floating" id="divkegiatan" hidden>
            <input type="text" class="form-control" id="inputkegiatan" placeholder="" required>
            <label for="inputkegiatan">Kegiatan hari ini</label>
          </div>
          <button class="btn btn-sm btn-primary btn-user btn-block mt-1" id="btnsubmit" name="login">Submit</button>
        <!-- </form> -->

      </div>
    </div>
    
  </div>
</body>

</html>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $('#btnlogin').click(function () {
    $('#divlogin').prop('hidden', false)
    $('#divabsen').prop('hidden', true)
  })
  $('#btnabsen').click(function () {
    $('#divlogin').prop('hidden', true)
    $('#divabsen').prop('hidden', false)
  })

  function showTime() {
      var d = new Date();
      document.getElementById("datetime").innerHTML = d.toLocaleDateString()+' - '+d.toLocaleTimeString();
  }

  function checkstatus() {
    $.getJSON('api.php?case=cekstatus',function(item){
      // console.log(item.nama_status)
      $('#idstatus').val(item.status)
      $('.cekstatus').text(item.nama_status)

      if(item.status == 4 || item.status == 2) {
        $('#divkegiatan').prop('hidden',false)
      }
    })
  }
  
  $('#btnsubmit').click(function(){
    // console.log('submit')
    var rfid = $('#inputrfid').val();
    var kegiatan = $('#inputkegiatan').val();
    var idstatus = $('#idstatus').val();
    // $("#inputkegiatan").prop('required',true);


    if(idstatus == 4 || idstatus == 2) {
      var url = 'api.php?case=absensi&status='+idstatus+'&rfid='+rfid+'&kegiatan='+kegiatan;
    } else {
      var url = 'api.php?case=absensi&status='+idstatus+'&rfid='+rfid;
    }

    if((idstatus == 4 || idstatus == 2) && (kegiatan == null || kegiatan == '')) {
      alert('kegiatan harus di isi')
    } else {

      $.getJSON(url,function(item) {
        console.log(item)
        if(item.status == 200) {
            alert('Absen Berhasil')
            // setTimeout(function(){window.location.reload();}, 1000);
        } else if(item.status == 404) {
            alert('Gagal Absen') 
            // setTimeout(function(){window.location.reload();}, 1000);
        } else if(item.status == 500) {
            alert('Anda Sudah Absen')
            // setTimeout(function(){window.location.reload();}, 1000);
        } else if(item.status == 505) {
            alert('rfid Tidak Ditemukan')
        } else {
            alert('Anda Melewatkan Absen Jam Sebelumnya')
        }
                
          
        })

    }
  });

  checkstatus();
  setInterval(showTime, 100);
  // setTimeout(function(){window.location.reload();}, 20000);
 
</script>
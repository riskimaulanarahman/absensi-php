<?php

session_start();
require 'config/koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST["Username"];
  $password = md5($_POST["Password"]);

  $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");
  $aksi = mysqli_num_rows($query);
  // if($hasil_query['level'] == "Administrator") {
    if($aksi > 0){

      $hasil_query = mysqli_fetch_assoc($query);
      if($hasil_query['level']=="Administrator"){
              // kirim session
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $hasil_query['id'];
        echo "<script>
                alert('Anda Login Sebagai Administrator');
                window.location = 'admin'
              </script>
              ";
      // header("Location: admin");
      } else if($hasil_query['level']=="Karyawan"){
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $hasil_query['id'];
        echo "<script>
                alert('Anda Login Sebagai Karyawan');
                window.location = 'karyawan'
              </script>
              ";
      } else {
        echo "<script>
                alert('Maaf, Username atau Password anda salah');
                window.location = '../absensi'
              </script>";
      }
    } else {
      echo "<script>
              alert('Maaf, Username atau Password anda salah');
              window.location = '../absensi'
            </script>";
    }
  // }
}


?>
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

$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
$result = mysqli_fetch_assoc($query);

$passwordLama = $result['password'];

if (isset($_POST['edit'])) {

	$nidn				= $_POST['nidn'];
	$nama				= $_POST['nama'];
	$tgl_lahir			= $_POST['tgl_lahir'];
	$jenis_kelamin		= $_POST['jenis_kelamin'];
	$alamat				= $_POST['alamat'];
	$email				= $_POST['email'];
	$username			= $_POST['username'];
	$password			= $_POST['password'];
	if($passwordLama == $password){
		$sintaks = "UPDATE user SET nidn = '$nidn', nama = '$nama', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', email = '$email', password = '$password', password = '$passwordLama' WHERE id = '$id'";
		$query = mysqli_query($conn, $sintaks);
		if($query){
			echo "<script>
                    alert('data berhasil diganti');
                    window.location = '../setting';
                </script>";
		} else {
			echo "<script>
	                alert('gambar gagal diganti');
	                window.location = '../setting';
	            </script>";
	    } 
	} else {
		$passwordBaru		= md5($_POST['password']);
		$sintaks = "UPDATE user SET nidn = '$nidn', nama = '$nama', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', email = '$email', password = '$password', password = '$passwordBaru' WHERE id = '$id'";
		$query = mysqli_query($conn, $sintaks);
		if($query){
			echo "<script>
                    alert('data berhasil diganti');
                    window.location = '../setting';
                </script>";
		} else {
			echo "<script>
	                alert('gambar gagal diganti');
	                window.location = '../setting';
	            </script>";
	    } 
	}

}

?>
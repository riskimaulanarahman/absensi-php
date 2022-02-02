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

if (isset($_POST['gantiGambar'])) {
	$namaFile = $_FILES['gambar']['name'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	
	// insert nama gamabr
	$sintaks = "UPDATE user SET photo = '$namaFile' WHERE id = '$id'";
	$query = mysqli_query($conn, $sintaks);
	if ($query) {
		// fungsi upload gambar
		$pindahGambar = move_uploaded_file($tmpName, '../../assets/profil/' . $namaFile);
		if ($pindahGambar) {
			echo "<script>
	                    alert('gambar berhasil diganti');
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
<?php
session_start();
     
include("config/koneksi.php");
date_default_timezone_set("Asia/Singapore");
error_reporting(0);
ini_set('display_errors', 0);
switch ($_GET['case']) {
    //BEGIN===================================================================================
    case 'absensi':
        $status = $_GET['status'];
        $rfid = $_GET['rfid'];
        $kegiatan = isset($_GET['kegiatan']) ? $_GET['kegiatan'] : '';

        $datenow = date("Y-m-d");
        $timenow = date("H:i:s");

        $quegetkaryawan = mysqli_query($conn, "SELECT * FROM user WHERE rfid = $rfid");
        $result = mysqli_fetch_assoc($quegetkaryawan);
        $rfid = $result['rfid'];
        $nama = $result['nama'];
        $nidn = $result['nidn'];

        if($rfid == null) {
            echo json_encode(array("status"=>505)); //rfid undefined
        } else {            
            $cekrfid = mysqli_query($conn, "SELECT * FROM absensi WHERE rfid = $rfid AND tanggal='$datenow' ");
            $rcekrfid = mysqli_fetch_assoc($cekrfid);
            if($status == 1) {
                
                if($rcekrfid['tanggal'] == $datenow && $rcekrfid['jam_masuk'] !== null) {
                    echo json_encode(array("status"=>500)); //sudah absen
                } else {
                    $sql = "INSERT INTO absensi (rfid,nama,nidn,tanggal,jam_masuk) VALUES ($rfid,'$nama','$nidn','$datenow','$timenow')";
                    if (mysqli_query($conn, $sql)) {
                        // echo "Berhasil Absen";
                        echo json_encode(array("status"=>200));
                        
                    } else {
                        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        echo json_encode(array("status"=>404));
                        
                    }
                }
            } else if($status == 2) {
                
                if($rcekrfid['tanggal'] == $datenow && $rcekrfid['jam_istirahat'] !== null) {
                    echo json_encode(array("status"=>500)); //sudah absen
                } else {
                    if($rcekrfid['rfid'] !== null) {

                        $sql = "UPDATE absensi SET jam_istirahat='$timenow' WHERE rfid = $rfid AND tanggal='$datenow' ";
                        if (mysqli_query($conn, $sql)) {
                            // echo "Berhasil Absen";
                            echo json_encode(array("status"=>200));
                            
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode(array("status"=>404));
                            
                        }
                    } else {
                        $sql = "INSERT INTO absensi (rfid,nama,nidn,tanggal,jam_istirahat) VALUES ($rfid,'$nama','$nidn','$datenow','$timenow')";
                        if (mysqli_query($conn, $sql)) {
                            // echo "Berhasil Absen";
                            echo json_encode(array("status"=>200));
                            
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode(array("status"=>404));
                            
                        }
                    }
                }
            } else if($status == 3) {
                
                if($rcekrfid['tanggal'] == $datenow && $rcekrfid['jam_kembali'] !== null) {
                    echo json_encode(array("status"=>500)); //sudah absen
                } else {
                    if($rcekrfid['rfid'] !== null) {
                        
                        $sql = "UPDATE absensi SET jam_kembali='$timenow' WHERE rfid = $rfid AND tanggal='$datenow' ";
                        if (mysqli_query($conn, $sql)) {
                            // echo "Berhasil Absen";
                            echo json_encode(array("status"=>200));
                            
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode(array("status"=>404));
                            
                        }
                    } else {
                        $sql = "INSERT INTO absensi (rfid,nama,nidn,tanggal,jam_kembali) VALUES ($rfid,'$nama','$nidn','$datenow','$timenow')";
                        if (mysqli_query($conn, $sql)) {
                            // echo "Berhasil Absen";
                            echo json_encode(array("status"=>200));
                            
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode(array("status"=>404));
                            
                        }
                    }
                }
            } else if($status == 4) {
                
                if($rcekrfid['tanggal'] == $datenow && $rcekrfid['jam_pulang'] !== null) {
                    echo json_encode(array("status"=>500)); //sudah absen
                } else {
                    if($rcekrfid['rfid'] !== null) {
                    
                        $sql = "UPDATE absensi SET jam_pulang='$timenow', kegiatan='$kegiatan' WHERE rfid = $rfid AND tanggal='$datenow' ";
                        if (mysqli_query($conn, $sql)) {
                            // echo "Berhasil Absen";
                            echo json_encode(array("status"=>200));
                            
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode(array("status"=>404));
                            
                        }
                    } else {
                        $sql = "INSERT INTO absensi (rfid,nama,nidn,tanggal,jam_pulang,kegiatan) VALUES ($rfid,'$nama','$nidn','$datenow','$timenow','$kegiatan')";
                        if (mysqli_query($conn, $sql)) {
                            // echo "Berhasil Absen";
                            echo json_encode(array("status"=>200));
                            
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode(array("status"=>404));
                            
                        }
                    }
                }
            }

        }

        mysqli_close($conn);
    break;
    //END API   ===================================================================================
    //BEGIN===================================================================================
    case 'cekstatus':
        $que = mysqli_query($conn, 
        "SELECT setting_status.`status`,status_absen.status as nama_status FROM setting_status 
         LEFT JOIN status_absen ON setting_status.status = status_absen.id
         WHERE setting_status.id=1
        ");
        while($row = $que->fetch_array(MYSQLI_ASSOC)) {
            $myArray = $row;
        }
        echo json_encode($myArray,JSON_NUMERIC_CHECK);

        mysqli_close($conn);
    break;
    //END API   ===================================================================================
    //BEGIN===================================================================================
    case 'settingabsensi':
        $status = $_GET['status'];
        $que = mysqli_query($conn,"UPDATE setting_status SET `status`=$status WHERE id=1 ");
        echo json_encode(array("status"=>200),JSON_NUMERIC_CHECK);

        mysqli_close($conn);
    break;
    //END API   ===================================================================================
    //BEGIN===================================================================================
    case 'myabsensi':
        $datenow = date("Y-m-d");
        $username = $_SESSION['username'];
        // $status = $_GET['status'];
        $queuser = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' ");
        $result = mysqli_fetch_assoc($queuser);
        $rfid = $result['rfid'];

        $que = mysqli_query($conn,"SELECT * FROM absensi WHERE rfid ='$rfid' AND tanggal='$datenow' ");
        while($row = $que->fetch_array(MYSQLI_ASSOC)) {
                $myArray['data'][] = $row;
        }
        echo json_encode($myArray);
        // echo json_encode(array("status"=>200),JSON_NUMERIC_CHECK);

        // mysqli_close($conn);
    break;
    //END API   ===================================================================================
    //BEGIN===================================================================================
    case 'rekapabsensi':
        // $tahun = date("Y");
        // $bulan = date("n");
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];

        $quetahunbulan = mysqli_query($conn,"SELECT * FROM tahunbulan WHERE tahun='$tahun' AND bulan='$bulan' ");
        $result = mysqli_fetch_assoc($quetahunbulan);
        $jumlah = $result['jumlah'];

        $sql = "SELECT
        rfid,
        nidn,
        nama,
        count(tanggal) as total_kehadiran,
        CONCAT(ROUND((count(tanggal)/$jumlah)*100),' %') as presentase_kehadiran,
        $jumlah-count(tanggal) as total_ketidakhadiran
    FROM `absensi`
    where month(tanggal) = '$bulan'
    group by rfid";

        $que = mysqli_query($conn,$sql);
        while($row = $que->fetch_array(MYSQLI_ASSOC)) {
                $myArray['data'][] = $row;
        }
        echo json_encode($myArray);
        // echo json_encode(array("status"=>200),JSON_NUMERIC_CHECK);

        // mysqli_close($conn);
    break;
    //END API   ===================================================================================
                        
}
?>
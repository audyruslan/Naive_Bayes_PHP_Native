<?php
session_start();
require '../functions.php';

function tambah_penduduk($data)
{
    global $conn;

    $no_kk = $data['no_kk'];
    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];

    $query = "INSERT INTO tb_penduduk
                (no_kk,nama_lengkap,jenis_kelamin,status)
				VALUES 
				('$no_kk','$nama_lengkap','$jenis_kelamin','0')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_penduduk($_POST) > 0) {
        $_SESSION['status'] = "Data Penduduk";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../penduduk.php");
    } else {
        $_SESSION['status'] = "Data Penduduk";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../penduduk.php");
    }
}

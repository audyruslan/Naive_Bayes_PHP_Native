<?php
session_start();
require '../functions.php';

function tambah_datalatih($data)
{
    global $conn;

    $no_kk = $data['no_kk'];
    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $usia = $data['usia'];
    $pendidikan_terakhir = $data['pendidikan_terakhir'];
    $pekerjaan = $data['pekerjaan'];
    $pendapatan_perbulan = $data['pendapatan_perbulan'];
    $kondisi_hunian = $data['kondisi_hunian'];
    $sejahtera = $data['sejahtera'];

    $query = "INSERT INTO tb_data
                (no_kk,nama_lengkap,jenis_kelamin,usia,pendidikan_terakhir,pekerjaan,pendapatan_perbulan,kondisi_hunian,sejahtera)
				VALUES 
				('$no_kk','$nama_lengkap','$jenis_kelamin','$usia','$pendidikan_terakhir','$pekerjaan','$pendapatan_perbulan','$kondisi_hunian','$sejahtera')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_datalatih($_POST) > 0) {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../datalatih.php");
    } else {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../datalatih.php");
    }
}

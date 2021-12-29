<?php
session_start();
require '../functions.php';

function ubah_penduduk($data)
{
    global $conn;
    $id = $data["id"];
    $no_kk = $data['no_kk'];
    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];

    $query = "UPDATE tb_penduduk
                SET
				no_kk = '$no_kk',
				nama_lengkap = '$nama_lengkap',
				jenis_kelamin = '$jenis_kelamin'
                WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_penduduk($_POST) > 0) {
        $_SESSION['status'] = "Data Penduduk";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
        header("Location: ../penduduk.php");
    } else {
        $_SESSION['status'] = "Data Penduduk";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
        header("Location: ../penduduk.php");
    }
}

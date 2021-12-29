<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Data Latih - Naive Bayes";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

$user = $_SESSION["username"];
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
$admin = mysqli_fetch_assoc($query);
require 'layouts/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Latih</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="datalatih.php">Data Latih</a></li>
                        <li class="breadcrumb-item active">Data Latih</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="no_kk">Masukkan No.KK</label>
                            <input class="form-control" placeholder="Masukkan No. KK" type="text" id="cari" name="cari" value="<?php if (isset($_GET['cari'])) {
                                                                                                                                    echo $_GET['cari'];
                                                                                                                                } ?>" size="100" autocomplete="off" autofocus required>

                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_GET['cari'])) {

                $cari = $_GET['cari'];

                $data = mysqli_query($conn, "SELECT * FROM tb_penduduk
                                                        WHERE no_kk = '$cari'");

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_assoc($data)) {
            ?>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" autocomplete="off" placeholder="Nama Lengkap" value="<?= $d["nama_lengkap"]; ?>" disabled>
                            </div>
                        </div>
                        <hr>
                        <form action="data_latih/tambah.php" method="POST">
                            <input type="hidden" class="form-control" name="no_kk" id="no_kk" value="<?= $d["no_kk"]; ?>">
                            <input type="hidden" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $d["nama_lengkap"]; ?>">
                            <input type="hidden" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $d["jenis_kelamin"]; ?>">
                            <div class="row">
                                <div class="col-4">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                        <option value="">--Silahkan Pilih--</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Pendidikan Terakhir'");
                                        while ($pt = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                                        <option value="">--Silahkan Pilih--</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Pekerjaan'");
                                        while ($pt = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="pendapatan_perbulan">Pendapatan Perbulan</label>
                                    <select class="form-control" name="pendapatan_perbulan" id="pendapatan_perbulan" required>
                                        <option value="">--Silahkan Pilih--</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Pendapatan Perbulan'");
                                        while ($pt = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="usia">Usia</label>
                                    <input type="number" class="form-control" name="usia" id="usia" placeholder="Usia" required>
                                </div>
                                <div class="col-4">
                                    <label for="kondisi_hunian">Kondisi Hunian</label>
                                    <select class="form-control" name="kondisi_hunian" id="kondisi_hunian" required>
                                        <option value="">--Silahkan Pilih--</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kondisi Hunian'");
                                        while ($pt = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="sejahtera">Sejahtera</label>
                                    <select class="form-control" name="sejahtera" id="sejahtera" required>
                                        <option value="">--Silahkan Pilih--</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Sejahtera'");
                                        while ($pt = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3" name="tambah"><i class="icon fas fa-plus-circle"> Tambah Data!</i></button>

                        </form>
                    <?php } ?>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-4">
                            <p class="alert alert-danger">Data <b><?= $_GET['cari']; ?></b> Tidak Ada</p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>
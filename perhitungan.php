<?php
session_start();
$title = "Perhitungan - Naive Bayes";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perhitungan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Perhitungan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php
            if (isset($_POST["submit"])) {
                $no_kk = $_POST["no_kk"];
                $nama_lengkap = $_POST["nama_lengkap"];
                $jenis_kelamin = $_POST["jenis_kelamin"];
                $usia = $_POST["usia"];
                $pendidikan_terakhir = $_POST["pendidikan_terakhir"];
                $pekerjaan = $_POST["pekerjaan"];
                $pendapatan_perbulan = $_POST["pendapatan_perbulan"];
                $kondisi_hunian = $_POST["kondisi_hunian"];

                // Perhitungan Naive Bayes
                // Ambil Data 
                $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data"));
                // Ambil Data Kelas Ya
                $Ya = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Ya'"));
                // Ambil Data Kelas Tidak
                $Tidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Tidak'"));
                $hasilYa = $Ya / $data;
                $hasilTidak = $Tidak / $data;

                // Ambil Data Kelas Usia
                $usiaYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Ya' AND usia = '52'"));
                $usiaTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Tidak' AND usia > '50'"));
                $hasilusiaYa = $usiaYa / $Ya;
                $hasilusiaTidak = $usiaTidak / $Tidak;

                // Ambil Data Kelas Pendidikan Terakhir 
                $pendidikanYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Ya' AND pendidikan_terakhir = '$pendidikan_terakhir'"));
                $pendidikanTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Tidak' AND pendidikan_terakhir = '$pendidikan_terakhir'"));
                $hasilpendidikanYa = $pendidikanYa / $Ya;
                $hasilpendidikanTidak = $pendidikanTidak / $Tidak;

                // Ambil Data Kelas Pekerjaan
                $pekerjaanYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Ya' AND pekerjaan = '$pekerjaan'"));
                $pekerjaanTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Tidak' AND pekerjaan = '$pekerjaan'"));
                $hasilpekerjaanYa = $pekerjaanYa / $Ya;
                $hasilpekerjaanTidak = $pekerjaanTidak / $Tidak;

                // Ambil Data Pendapatan Perbulan
                $pendapatanYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Ya' AND pendapatan_perbulan = '$pendapatan_perbulan'"));
                $pendapatanTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Tidak' AND pendapatan_perbulan = '$pendapatan_perbulan'"));
                $hasilpendapatanYa = $pendapatanYa / $Ya;
                $hasilpendapatanTidak = $pendapatanTidak / $Tidak;

                // Ambil Data Kondisi Hunian
                $kondisiYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Ya' AND kondisi_hunian = '$kondisi_hunian'"));
                $kondisiTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE sejahtera = 'Tidak' AND kondisi_hunian = '$kondisi_hunian'"));
                $hasilkondisiYa = $kondisiYa / $Ya;
                $hasilkondisiTidak = $kondisiTidak / $Tidak;

                // Menghitung Probabilitas Akhir Ya
                $hasilpYa = $hasilusiaYa * $hasilpendidikanYa * $hasilpendapatanYa * $hasilpekerjaanYa * $hasilkondisiYa * $Ya;
                // Menghitung Probabilitas Akhir Tidak
                $hasilpTidak = $hasilusiaTidak * $hasilpendidikanTidak * $hasilpendapatanTidak * $hasilpekerjaanTidak * $hasilkondisiTidak * $Tidak;
            ?>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>No. KK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Pekerjaan</th>
                                    <th>Pendapatan Perbulan</th>
                                    <th>Kondisi Hunian</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><?= $no_kk; ?></td>
                                <td><?= $nama_lengkap; ?></td>
                                <td><?= $jenis_kelamin; ?></td>
                                <td><?= $usia; ?></td>
                                <td><?= $pendidikan_terakhir; ?></td>
                                <td><?= $pekerjaan; ?></td>
                                <td><?= $pendapatan_perbulan; ?></td>
                                <td><?= $kondisi_hunian; ?></td>
                                <?php
                                if ($hasilpYa > $hasilpTidak) {
                                ?>
                                    <td>
                                        <p>Sejahtera</p>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <p>Tidak Sejahtera</p>
                                    </td>
                                <?php } ?>
                            </tr>
                        </table>
                        <form action="add_data.php" method="POST">
                            <input type="hidden" name="no_kk" id="no_kk" value="<?= $no_kk; ?>">
                            <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?= $nama_lengkap; ?>">
                            <input type="hidden" name="jenis_kelamin" id="jenis_kelamin" value="<?= $jenis_kelamin; ?>">
                            <input type="hidden" name="usia" id="usia" value="<?= $usia; ?>">
                            <input type="hidden" name="pendidikan_terakhir" id="pendidikan_terakhir" value="<?= $pendidikan_terakhir; ?>">
                            <input type="hidden" name="pekerjaan" id="pekerjaan" value="<?= $pekerjaan; ?>">
                            <input type="hidden" name="pendapatan_perbulan" id="pendapatan_perbulan" value="<?= $pendapatan_perbulan; ?>">
                            <input type="hidden" name="kondisi_hunian" id="kondisi_hunian" value="<?= $kondisi_hunian; ?>">
                            <?php
                            if ($hasilpYa > $hasilpTidak) {
                            ?>
                                <input type="hidden" name="sejahtera" id="sejahtera" value="Ya">
                            <?php } else { ?>
                                <input type="hidden" name="sejahtera" id="sejahtera" value="Tidak">
                            <?php } ?>
                            <button type="submit" class="btn btn-primary float-right" name="simpan"><i class="fas fa-save"></i> Simpan Data!</button>
                        </form>
                    </div>
                </div>

                <div class="attachment-block clearfix mt-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="mt-3 mb-4">Hasil Perhitungan</h4>
                            <div class="d-flex">
                                <div class="col-6">
                                    <div class="callout callout-secondary">
                                        <h5>Peluang Sejahtera Ya</h5>
                                        <h3 class="text text-success"><?= $hasilpYa; ?><h3>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="callout callout-secondary">
                                        <h5>Peluang Sejahtera Tidak</h5>
                                        <h3 class="text text-danger"><?= $hasilpTidak; ?><h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Proses Perhitungan -->
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Proses Perhitungan Naive Bayes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>Probabilitas Kelas (Y=Ya)</h5>
                                <p>P(<strong>Y</strong> = <strong>Ya</strong>) = <?= $Ya . '/' . $data; ?> = <strong><?= $hasilYa; ?></strong></p>
                            </div>
                            <div class="col-6">
                                <h5>Probabilitas Kelas (Y=Tidak)</h5>
                                <p>P(<strong>Y</strong> = <strong>Tidak</strong>) = <?= $Tidak . '/' . $data; ?> = <strong><?= $hasilTidak; ?></strong></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <h5>Probabilitas Posterior P(Xi|Ya)</h5>
                                <p>P(<strong>Usia</strong> = <strong>A3</strong> | Y=YA) = <?= $usiaYa . '/' . $Ya; ?> = <?= $hasilusiaYa; ?></p>
                                <p>P(<strong>Pendidikan Terakhir</strong> = <strong><?= $pendidikan_terakhir; ?></strong> | Y=YA) = <?= $pendidikanYa . '/' . $Ya; ?> = <?= $hasilpendidikanYa; ?></p>
                                <p>P(<strong>Pekerjaan</strong> = <strong><?= $pekerjaan; ?></strong> | Y=YA) = <?= $pekerjaanYa . '/' . $Ya; ?> = <?= $hasilpekerjaanYa; ?></p>
                                <p>P(<strong>Pendapatan Perbulan</strong> = <strong><?= $pendapatan_perbulan; ?></strong> | Y=YA) = <?= $pendapatanYa . '/' . $Ya; ?> = <?= $hasilpendapatanYa; ?></p>
                                <p>P(<strong>Kondisi Hunian</strong> = <strong><?= $kondisi_hunian; ?></strong> | Y=YA) = <?= $kondisiYa . '/' . $Ya; ?> = <?= $hasilkondisiYa; ?></p>
                            </div>
                            <div class="col-6">
                                <h5>Probabilitas Posterior P(Xi|Tidak)</h5>
                                <p>P(<strong>Usia</strong> = <strong>A3</strong> | Y=Tidak) = <?= $usiaTidak . '/' . $Tidak; ?> = <?= $hasilusiaTidak; ?></p>
                                <p>P(<strong>Pendidikan Terakhir</strong> = <strong><?= $pendidikan_terakhir; ?></strong> | Y=Tidak) = <?= $pendidikanTidak . '/' . $Tidak; ?> = <?= $hasilpendidikanTidak; ?></p>
                                <p>P(<strong>Pekerjaan</strong> = <strong><?= $pekerjaan; ?></strong> | Y=Tidak) = <?= $pekerjaanTidak . '/' . $Tidak; ?> = <?= $hasilpekerjaanTidak; ?></p>
                                <p>P(<strong>Pendapatan Perbulan</strong> = <strong><?= $pendapatan_perbulan; ?></strong> | Y=Tidak) = <?= $pendapatanTidak . '/' . $Tidak; ?> = <?= $hasilpendapatanTidak; ?></p>
                                <p>P(<strong>Kondisi Hunian</strong> = <strong><?= $kondisi_hunian; ?></strong> | Y=Tidak) = <?= $kondisiTidak . '/' . $Tidak; ?> = <?= $hasilkondisiTidak; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-6">
                                <h5>P(KLASIFIKASI = YA) = P( X|Y = YA). P(Y=YA)</h5>
                                <p>P(<strong>Klasifikasi</strong> = <strong>Ya</strong> | Y=Tidak) = <?= $hasilusiaYa . ' x ' . $hasilpendidikanYa . ' x ' . $hasilpekerjaanYa . ' x ' . $hasilpendapatanYa . ' x ' . $hasilkondisiYa . ' x ' . $hasilYa; ?> = <strong><?= $hasilpYa; ?></strong></p>
                            </div>
                            <div class="col-6">
                                <h5>P(KLASIFIKASI = Tidak) = P( X|Y = Tidak). P(Y=Tidak)</h5>
                                <p>P(<strong>Klasifikasi</strong> = <strong>Tidak</strong> | Y=Tidak) = <?= $hasilusiaTidak . ' x ' . $hasilpendidikanYa . ' x ' . $hasilpekerjaanTidak . ' x ' . $hasilpendapatanTidak . ' x ' . $hasilkondisiTidak . ' x ' . $hasilTidak; ?> = <strong><?= $hasilpTidak; ?></strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kesimpulan -->
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Kesimpulan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($hasilpYa > $hasilpTidak) {
                        ?>
                            <p>Karena, Peluang Sejahtera <b class="text-success">YA</b> <strong>></strong> Peluang Sejahtera <b class="text-danger">TIDAK</b>, maka Kepala Keluarga tersebut <b class="text-primary">Sejahtera</b></p>
                        <?php } else { ?>
                            <p>Karena, Peluang Sejahtera <b class="text-danger">Tidak</b>
                                <strong>
                                    < </strong> Peluang Sejahtera <b class="text-success">Ya</b>, maka Kepala Keluarga tersebut <b class="text-primary">Tidak Sejahtera</b>
                            </p>
                        <?php } ?>
                    </div>
                </div>

            <?php } else { ?>
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
                            if ($d["status"] == 1) {
                ?>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="alert alert-danger">
                                            <strong>Data Atas Nama <?= $d["nama_lengkap"]; ?> dengan No.KK <?= $cari; ?> Sudah Terdaftar</strong>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" autocomplete="off" placeholder="Nama Lengkap" value="<?= $d["nama_lengkap"]; ?>" disabled>
                                    </div>
                                </div>
                                <hr>
                                <form action="" method="POST">
                                    <input type="hidden" class="form-control" name="no_kk" id="no_kk" value="<?= $d["no_kk"]; ?>">
                                    <input type="hidden" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $d["nama_lengkap"]; ?>">
                                    <input type="hidden" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $d["jenis_kelamin"]; ?>">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="usia">Usia</label>
                                            <input type="number" class="form-control" name="usia" id="usia" placeholder="Usia" required>
                                        </div>
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
                                    </div>
                                    <div class="row">
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
                                    </div>

                                    <button type="submit" class="float" name="submit"><i class="icon fas fa-search-plus"></i></button>

                                </form>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-4">
                                <p class="alert alert-danger">Data <b><?= $_GET['cari']; ?></b> Tidak Ada</p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>


            <?php } ?>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>
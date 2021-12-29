<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Gejala - Certainty Factor (CF)";
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
                    <h1 class="m-0">Data Penduduk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Penduduk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-secondary">
                <div class="row">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary ml-2 mt-3 mb-3" data-toggle="modal" data-target="#tambahModal">
                            Tambah Data
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penduduk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="penduduk/tambah.php" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="no_kk">No. KK</label>
                                                <input type="text" autocomplete="off" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" autocomplete="off" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label><select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option>--Silahkan Pilih--</option>
                                                    <option value="Laki-laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-hover" id="example" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. KK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_penduduk");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['no_kk']; ?></td>
                                        <td><?= $row['nama_lengkap']; ?></td>
                                        <td><?= $row['jenis_kelamin']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm ubah" data-toggle="modal" data-target="#EditModal<?= $row["id"]; ?>"><i class="fas fa-edit"></i> </a>
                                            <a class="btn btn-danger btn-sm hapus_penduduk" href="penduduk/hapus.php?id=<?= $row["id"]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="EditModal<?= $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="#EditModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditModalLabel">Ubah Penduduk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="penduduk/ubah.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                        <div class="form-group">
                                                            <label for="no_kk">No. KK</label>
                                                            <input type="text" autocomplete="off" class="form-control" id="no_kk" name="no_kk" value="<?= $row["no_kk"]; ?>" placeholder="No. KK">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                            <input type="text" autocomplete="off" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $row["nama_lengkap"]; ?>" placeholder="Nama Lengkap">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                                <option>--Silahkan Pilih--</option>
                                                                <option value="Laki-laki" <?php if ($row["jenis_kelamin"] == "Laki-laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
                                                                <option value="Perempuan" <?php if ($row["jenis_kelamin"] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembail</button>
                                                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>

                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>
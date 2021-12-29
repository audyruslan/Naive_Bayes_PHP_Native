<?php
session_start();
$title = "Administrator - Naive Bayes";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

if (isset($_SESSION["login"])) {
  $user = $_SESSION["username"];
  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
  $admin = mysqli_fetch_assoc($query);
}
require 'layouts/sidebar.php';

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thermometer"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Kriteria</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_kriteria"));
                ?>
                <?= $mhs; ?>
                <small>Kriteria</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Data</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data"));
                ?>
                <?= $mhs; ?>
                <small>Data</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Admin Pakar</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"));
                ?>
                <?= $mhs; ?>
                <small>Admin Pakar</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="callout callout-danger">
            <h5>
              <i class="fas fa-bullhorn"></i> Sistem Informasi dengan Metode Perhitungan Naive Bayes!
            </h5>

            <p>Sistem ini dapat membantu dalam menyeleksi dan memberikan pendukung terhadap suatu keputusan yang akan diambil, sistem ini juga bertujuan untuk menyediakan informasi, membimbing, memberikan prediksi serta mengarahkan kepada pengguna informasi agar dapat melakukan pengambilan keputusan dengan lebih baik..</p>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>
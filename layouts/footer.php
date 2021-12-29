  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; <?= date("Y"); ?> <a href="https://instacode.epizy.com">InstaCode.epizy.com</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 0.1
      </div>
  </footer>


  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- Sweetalert -->
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- FLOT CHARTS -->
  <script src="plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="pluginsplugins/jquery.flot.resize.js"></script>
  <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  <script src="plugins/flot/plugins/jquery.flot.pie.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- My Script -->
  <script src="assets/js/script.js"></script>

  <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
      <script>
          Swal.fire({
              title: '<?= $_SESSION['status'];  ?>',
              icon: '<?= $_SESSION['status_icon'];  ?>',
              text: '<?= $_SESSION['status_info'];  ?>'
          });
      </script>
  <?php
        unset($_SESSION['status']);
    }
    ?>
  <script>
      $(function() {
          // Summernote
          $('#det_post').summernote();
          $('#srn_post').summernote();
          $('#Edet_post').summernote();
          $('#Esrn_post').summernote();

          // DataTable
          $("#example").DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
          $("#example-table").DataTable();
      });

      // Hapus Admin
      $(document).on('click', '.hapus_admin', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Admin!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Kriteria
      $(document).on('click', '.hapus_kriteria', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Kriteria!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Kondisi
      $(document).on('click', '.hapus_kondisi', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Kondisi!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Penduduk
      $(document).on('click', '.hapus_penduduk', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Penduduk!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Kelas
      $(document).on('click', '.hapus_kelas', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Kelas!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Data Latih
      $(document).on('click', '.hapus_datalatih', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Latih!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });

      // Hapus Hasil Riwayat
      $(document).on('click', '.hapus_riwayat', function(e) {

          e.preventDefault();
          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Data Hasil Riwayat!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.value) {
                  document.location.href = href;
              }

          })

      });
  </script>
  <script>
      $(function() {
          /*
           * DONUT CHART
           * -----------
           */


          <?php
            $hasilg = mysqli_query($conn, "SELECT hasil_id, count(hasil_id) jlh_id FROM hasil group by hasil_id ORDER BY jlh_id desc");
            while ($rg = mysqli_fetch_array($hasilg)) {
                if ($rg[0] > 0) {
                    $arr[] = array('label' => '&nbsp;' . $arpkt[$rg['hasil_id']], 'data' => array(array('Penyakit ' . $rg['hasil_id'], $rg['jlh_id'])));
                }
            }
            ?>
          var donutData = <?php echo json_encode($arr); ?>

          function legendFormatter(label, series) {
              return '<div class="text text-muted">' + label + ' ' + Math.round(series.percent) + '%';
          };

          $.plot('#donut-chart', donutData, {
              series: {
                  pie: {
                      show: true,
                      radius: 1,
                      innerRadius: 0.3,
                      label: {
                          show: true,
                          radius: 2 / 3,
                          formatter: function(label, series) {
                              return '<div class="badge bg-navy color-pallete">' + Math.round(series.percent) + '%</div>';
                          },
                          threshold: 0.1
                      }

                  }
              },
              legend: {
                  show: false
              }
          })
          /*
           * END DONUT CHART
           */

      })

      /*
       * Custom Label formatter
       * ----------------------
       */
      function labelFormatter(label, series) {
          return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
              label +
              '<br>' +
              Math.round(series.percent) + '%</div>'
      }
  </script>
  </body>

  </html>
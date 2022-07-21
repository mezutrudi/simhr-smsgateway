</div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script src="<?=base_url('public/')?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('public/')?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url('public/')?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="<?=base_url('public/')?>dist/js/app-style-switcher.js"></script>
    <script src="<?=base_url('public/')?>dist/js/feather.min.js"></script>
    <script src="<?=base_url('public/')?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url('public/')?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url('public/')?>dist/js/custom.min.js"></script>
    <script src="<?=base_url('public/')?>assets/moment.min.js"></script>
    <script src="<?=base_url('public/')?>assets/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?=base_url('public/')?>assets/daterangepicker.js"></script>
    <!--This page JavaScript -->
    <script src="<?=base_url('public/')?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?=base_url('public/')?>assets/extra-libs/c3/c3.min.js"></script>
    <script src="<?=base_url('public/')?>assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url('public/')?>assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=base_url('public/')?>datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url('public/')?>datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?=base_url('public/')?>sweetalert/sweetalert2.min.js"></script>
    <script>
      $(function() {
        $('#example2').DataTable( {
          "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
        });
      });
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>
</body>

</html>
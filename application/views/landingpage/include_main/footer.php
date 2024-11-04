<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2024 - 2025 <a href="" class="text-navy"> SummerGroup</a>.</strong> All rights reserved.
</footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="<?= base_url('assets/template-adm') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template-adm') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/template-adm') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template-adm') ?>/dist/js/adminlte.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>
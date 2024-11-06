</div>
</div>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2024 - 2025 <a href="" class="text-navy"> SummerGroup</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
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


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    // Toggle "Select All" functionality
    document.getElementById("selectAll").addEventListener("click", function() {
        var checkboxes = document.querySelectorAll(".select-row");
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        toggleDownloadButton();
    });

    // Show or hide the download button based on selection
    document.querySelectorAll(".select-row").forEach(checkbox => {
        checkbox.addEventListener("change", toggleDownloadButton);
    });

    function toggleDownloadButton() {
        var anyChecked = Array.from(document.querySelectorAll(".select-row")).some(checkbox => checkbox.checked);
        document.getElementById("downloadZip").style.display = anyChecked ? "block" : "none";
    }

    // Handle the download action
    document.getElementById("downloadZip").addEventListener("click", function() {
        var selected = Array.from(document.querySelectorAll(".select-row:checked")).map(cb => cb.value);
        window.location.href = "<?= site_url('admin/download_zip') ?>?ids=" + selected.join(",");
    });
</script>
<script>
    $(document).ready(function() {
        // Cek apakah ada flashdata untuk toast
        <?php if ($this->session->flashdata('toast')) : ?>
            var toastData = <?= json_encode($this->session->flashdata('toast')) ?>;
            $(document).Toasts('create', {
                class: toastData.class,
                title: toastData.title,
                body: toastData.body
            });
        <?php endif; ?>
    });
</script>
</body>

</html>
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
        // Inisialisasi DataTable
        var table = $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "buttons": [],
            "info": false,
            "scrollCollapse": true,
            "order": [
                [4, 'desc']
            ], // Mengurutkan berdasarkan kolom status secara default
        });

        // Fungsi untuk mengambil data peserta terbaru
        function fetchData() {
            $.ajax({
                url: '<?= base_url("Admin/get_live_data") ?>', // Sesuaikan dengan URL endpoint Anda
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Kosongkan tabel terlebih dahulu
                        table.clear();

                        // Tambahkan setiap peserta ke tabel, dengan yang `SUCCESS` di urutan teratas
                        response.data.forEach(function(peserta) {
                            var statusClass = 'secondary';
                            if (peserta.status_presensi === 'PREPARE') statusClass = 'warning';
                            else if (peserta.status_presensi === 'SUCCESS') statusClass = 'success';
                            else if (peserta.status_presensi === 'FAILED') statusClass = 'danger';

                            var badgeNew = (peserta.tgl_input === '<?= date('Y-m-d') ?>') ?
                                '<span class="right badge badge-success">New Data</span>' : '';

                            table.row.add([
                                peserta.nama_lengkap + ' ' + badgeNew,
                                peserta.kelas,
                                peserta.plotting,
                                peserta.status_peserta,
                                `<button type="button" class="btn btn-${statusClass} btn-sm text-white">${peserta.status_presensi}</button>`
                            ]);
                        });

                        // Perbarui tabel DataTable
                        table.draw();
                    }
                }
            });
        }

        // Interval untuk polling data setiap 5 detik
        setInterval(fetchData, 5000); // Sesuaikan interval sesuai kebutuhan
    });
</script>

<style>
    .compact-table td,
    .compact-table th {
        padding: 0.8px 5px !important;
        font-size: 14px;
        vertical-align: middle;
    }

    .compact-table .btn {
        padding: 1px 5px !important;
        font-size: 12px;
    }
</style>
</body>

</html>
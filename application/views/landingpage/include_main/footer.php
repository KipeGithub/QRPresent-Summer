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
            "paging": false, // Nonaktifkan pagination agar semua data ditampilkan dalam satu halaman
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "ordering": false, // Nonaktifkan pengurutan kolom
            "info": false,
            "scrollCollapse": true,
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
                            var statusText = 'Unknown';

                            if (peserta.status_presensi === 'PREPARE') {
                                statusClass = 'danger';
                                statusText = 'Belum Hadir';
                            } else if (peserta.status_presensi === 'SUCCESS') {
                                statusClass = 'success';
                                statusText = 'Hadir';
                            } else if (peserta.status_presensi === 'FAILED') {
                                statusClass = 'danger';
                                statusText = 'Gagal Hadir';
                            }

                            var badgeNew = (peserta.tgl_input === '<?= date('Y-m-d') ?>') ? '<span class="right badge badge-success">*</span>' : '';

                            table.row.add([
                                peserta.nama_lengkap + ' ' + badgeNew,
                                peserta.kelas,
                                peserta.plotting,
                                peserta.status_peserta,
                                `<button type="button" class="btn btn-${statusClass} btn-sm text-white">${statusText}</button>`
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
<script>
    $(document).ready(function() {
        // Fungsi untuk mengambil data rekap
        function updateRekapData() {
            $.ajax({
                url: '<?= base_url("Admin/get_rekap_data") ?>', // Ganti dengan URL controller Anda
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Memperbarui elemen dengan ID success_count dan prepare_count
                    $('#success_count').text(data.success_count);
                    $('#prepare_count').text(data.prepare_count);
                },
                error: function(xhr, status, error) {
                    console.log("Terjadi kesalahan: " + error);
                }
            });
        }

        // Panggil fungsi updateRekapData setiap 5 detik
        setInterval(updateRekapData, 5000);

        // Panggil fungsi untuk pertama kali saat halaman dimuat
        updateRekapData();
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
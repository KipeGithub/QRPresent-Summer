        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-navy card-outline">
                    <div class="card">
                        <div class="card-header">
                            <span class="p text-gray card-title">After the user scans the barcode, the system automatically changes 'Status Presensi' to 'Already Present'.</span>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr class="text-uppercase text-white align-center">
                                        <th class="align-middle bg-navy">NAMA LENGKAP</th>
                                        <th class="align-middle bg-navy">NAMA DEPAN</th>
                                        <th class="align-middle bg-navy">NAMA BELAKANG</th>
                                        <th class="align-middle bg-navy">KELAS</th>
                                        <th class="align-middle bg-navy">NO TELP</th>
                                        <th class="align-middle bg-navy">PLOTTING</th>
                                        <th class="align-middle bg-navy">ROLE</th>
                                        <th class="align-middle bg-navy">BARCODE</th>
                                        <th class="align-middle bg-navy">STATUS PRESENSI</th>
                                        <th class="align-middle bg-navy">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($get_live as $gl) :
                                    ?>
                                        <tr>
                                            <td><?= $gl->nama_lengkap ?></td>
                                            <td><?= $gl->nama_depan ?></td>
                                            <td><?= $gl->nama_belakang ?></td>
                                            <td><?= $gl->kelas ?></td>
                                            <td><?= $gl->contact ?></td>
                                            <td><?= $gl->plotting ?></td>
                                            <td><?= $gl->status_peserta ?></td>
                                            <td><?= $gl->barcode ?></td>
                                            <td>
                                                <?php if ($gl->status_presensi == 'PREPARE') :
                                                    $class = 'warning';
                                                elseif ($gl->status_presensi == 'SUCCESS') :
                                                    $class = 'success';
                                                elseif ($gl->status_presensi == 'FAILED') :
                                                    $class = 'danger';
                                                endif; ?>
                                                <button type="button" class="btn btn-<?= $class ?> text-white"><?= $gl->status_presensi ?></button>
                                            </td>
                                            <td align="center">
                                                <a href="#" class="btn btn-circle btn-warning btn-sm" data-toggle="modal" data-target="#edit_peserta<?= $gl->id_peserta ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" data-delete="<?= $gl->id_peserta ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Default -->
        <div class="modal fade" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data dengan ID: <span id="modal-id"></span>?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-danger" id="confirm-delete">Hapus</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <script type="text/javascript">
            // Mengatur event listener untuk tombol modal
            $(document).on('click', '[data-toggle="modal"]', function() {
                const id = $(this).data('delete'); // Ambil ID dari atribut data-delete
                $('#modal-id').text(id); // Tampilkan ID di dalam modal
                console.log('data'.id); // Debug: cetak ID ke konsol
            });

            // Fungsi untuk konfirmasi hapus
            $('#confirm-delete').on('click', function() {
                const id = $('#modal-id').text(); // Ambil ID yang ditampilkan
                // Lakukan redirect atau ajax ke controller delete
                window.location.href = '<?= base_url('Admin/delete_peserta/') ?>' + id; // Ganti dengan URL delete sesuai kebutuhan
            });
        </script>



        <!-- Tambahkan di bagian bawah view Anda, setelah semua konten HTML lainnya -->
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
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
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-lg-tambah-peserta">
                                <i class="fas fa-plus"></i>
                                <span> Tambah Peserta Satuan</span>
                            </button>
                            <div class="modal fade" id="modal-lg-tambah-peserta">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <span class="h5 font-weight-bold modal-title">Tambah Peserta Satuan</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-validate" method="post" action="<?= base_url('Admin/proses_input_satuan') . '?section=' . $title ?>" enctype="multipart/form-data">
                                                <?php
                                                $tanggal = date('Y/m/d');
                                                ?>
                                                <input type="hidden" name="tgl_input" value="<?php echo $tanggal; ?>">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" class="form-control" name="nama_lengkap" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Nama Depan</label>
                                                            <input type="text" class="form-control" name="nama_depan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Nama Belakang</label>
                                                            <input type="text" class="form-control" name="nama_belakang" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <select name="kelas" id="kelas" class="form-control" required>
                                                                <option value="X-ULW">X-ULW</option>
                                                                <option value="X-PH">X-PH</option>
                                                                <option value="X-KUL-1">X-KUL-1</option>
                                                                <option value="X-KUL-2">X-KUL-2</option>
                                                                <option value="X-KUL-3">X-KUL-3</option>
                                                                <option value="XI-PAR">XI-PAR</option>
                                                                <option value="-">-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Nomor Telepon</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">+62</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="contact" id="phoneNumber" required oninput="validatePhoneNumber(this)">
                                                            </div>
                                                            <small id="error-message" class="text-danger" style="display: none;">Nomor telepon tidak boleh dimulai dengan 0</small>
                                                        </div>
                                                        <script>
                                                            function validatePhoneNumber(input) {
                                                                input.value = input.value.replace(/\D/g, '');
                                                                if (input.value.startsWith('0')) {
                                                                    document.getElementById('error-message').style.display = 'block';
                                                                } else {
                                                                    document.getElementById('error-message').style.display = 'none';
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Plotting Bus</label>
                                                            <select name="plotting" id="plotting" class="form-control" required>
                                                                <option value="BUS-1">BUS-1</option>
                                                                <option value="BUS-2">BUS-2</option>
                                                                <option value="BUS-3">BUS-3</option>
                                                                <option value="BUS-4">BUS-4</option>
                                                                <option value="-">-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Status Peserta</label>
                                                            <select name="status_peserta" id="status_peserta" class="form-control" required>
                                                                <option value="SISWA">SISWA</option>
                                                                <option value="GURU">GURU</option>
                                                                <option value="-">-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php if ($this->session->userdata('level') === '0'): ?>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="text-danger">Status Presensi*</label>
                                                                <select name="status_presensi" id="status_presensi" class="form-control is-invalid" required>
                                                                    <option value="PREPARE">PREPARE</option>
                                                                    <option value="SUCCESS">SUCCESS</option>
                                                                    <option value="FAILED">FAILED</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin Data Sudah Benar? Harap perhatikan kembali isian data untuk menghindari terjadinya sistem eror.')">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr class="text-uppercase text-white align-center">
                                        <th class="align-middle bg-navy">
                                            <input type="checkbox" id="selectAll"> <!-- Checkbox untuk memilih semua -->
                                        </th>
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
                                    foreach ($get_live as $index => $gl) :
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="select-row" name="selected_peserta[]" value="<?= $gl->id_peserta ?>">
                                            </td>
                                            <td>
                                                <?= $gl->nama_lengkap ?>
                                                <?php
                                                $tanggal = date('Y-m-d');
                                                if ($gl->tgl_input == $tanggal):
                                                ?>
                                                    <span class="right badge badge-success">*</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $gl->nama_depan ?></td>
                                            <td><?= $gl->nama_belakang ?></td>
                                            <td><?= $gl->kelas ?></td>
                                            <td><?= $gl->contact ?></td>
                                            <td><?= $gl->plotting ?></td>
                                            <td><?= $gl->status_peserta ?></td>
                                            <td>
                                                <a id="downloadQR<?= $index ?>" class="d-flex justify-content-center">
                                                    <div id="qrcodeContainer<?= $index ?>">
                                                        <div id="qrcode<?= $index ?>"></div>
                                                    </div>
                                                </a>
                                                <!-- <?= $gl->barcode ?> -->
                                            </td>
                                            <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                                            <script>
                                                <?php if (!empty($gl->barcode)) : ?>
                                                    new QRCode("qrcode<?= $index ?>", {
                                                        text: "<?= $gl->barcode ?>",
                                                        width: 80,
                                                        height: 80
                                                    });
                                                <?php else : ?>
                                                    document.getElementById("qrcode<?= $index ?>").innerHTML = "Tidak Ada QR";
                                                <?php endif; ?>
                                            </script>
                                            <td>
                                                <?php
                                                if ($gl->status_presensi == 'PREPARE') :
                                                    $class = 'danger';
                                                    $text = 'Belum Hadir';
                                                ?>
                                                    <button type="button" class="btn btn-<?= $class ?> text-white"><?= $text ?></button>
                                                <?php elseif ($gl->status_presensi == 'SUCCESS') :
                                                    $class = 'success';
                                                    $text = 'Hadir'; ?>
                                                    <a href="#" class="btn btn-<?= $class ?> btn-sm" data-toggle="modal" data-target="#view_present<?= $gl->id_peserta ?>"><?= $text ?></a>
                                                <?php elseif ($gl->status_presensi == 'FAILED') :
                                                    $class = 'danger';
                                                    $text = 'Gagal Hadir'; ?>
                                                    <button type="button" class="btn btn-<?= $class ?> text-white"><?= $text ?></button>
                                                <?php endif; ?>
                                            </td>
                                            <td align="center">
                                                <a href="#" class="btn btn-circle btn-warning btn-sm" data-toggle="modal" data-target="#edit_peserta<?= $gl->id_peserta ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php if ($this->session->userdata('level') === '0'): ?>
                                                    <a href="<?= site_url('admin/delete_peserta/' . $gl->id_peserta . '?section=' . $title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin Data Peserta akan dihapus permanen?')">
                                                        <i class=" fas fa-trash"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('admin/show_invitation/' . $gl->id_peserta); ?>" class="btn btn-info  btn-sm" target="_blank">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Tombol download muncul hanya saat ada checkbox yang dicentang -->
                            <button id="downloadZip" class="btn btn-primary" style="display: none;">Download File as ZIP</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($get_live as $gl): ?>
            <div class="modal fade" id="edit_peserta<?= $gl->id_peserta ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <span class="h5 font-weight-bold modal-title">Edit Peserta</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-validate" method="post" action="<?= base_url('Admin/edit_peserta/') . $gl->id_peserta . '?section=' . $title ?>" enctype="multipart/form-data">
                                <?php
                                $tanggal = date('Y/m/d');
                                ?>
                                <input type="hidden" name="tgl_input" value="<?php echo $tanggal; ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?= $gl->nama_lengkap ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nama Depan</label>
                                            <input type="text" class="form-control" name="nama_depan" value="<?= $gl->nama_depan ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nama Belakang</label>
                                            <input type="text" class="form-control" name="nama_belakang" value="<?= $gl->nama_belakang ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select name="kelas" id="kelas" class="form-control" required>
                                                <option value="<?= $gl->kelas ?>"><?= $gl->kelas ?></option>
                                                <option value="X-ULW">X-ULW</option>
                                                <option value="X-PH">X-PH</option>
                                                <option value="X-KUL-1">X-KUL-1</option>
                                                <option value="X-KUL-2">X-KUL-2</option>
                                                <option value="X-KUL-3">X-KUL-3</option>
                                                <option value="XI-PAR">XI-PAR</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+62</span>
                                                </div>
                                                <input type="text" class="form-control" name="contact" value="<?= $gl->contact ?>" id="phoneNumber" required oninput="validatePhoneNumber(this)">
                                            </div>
                                            <small id="error-message" class="text-danger" style="display: none;">Nomor telepon tidak boleh dimulai dengan 0</small>
                                        </div>
                                        <script>
                                            function validatePhoneNumber(input) {
                                                input.value = input.value.replace(/\D/g, '');
                                                if (input.value.startsWith('0')) {
                                                    document.getElementById('error-message').style.display = 'block';
                                                } else {
                                                    document.getElementById('error-message').style.display = 'none';
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Plotting Bus</label>
                                            <select name="plotting" id="plotting" class="form-control" required>
                                                <option value="<?= $gl->plotting ?>"><?= $gl->plotting ?></option>
                                                <option value="BUS-1">BUS-1</option>
                                                <option value="BUS-2">BUS-2</option>
                                                <option value="BUS-3">BUS-3</option>
                                                <option value="BUS-4">BUS-4</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Status Peserta</label>
                                            <select name="status_peserta" id="status_peserta" class="form-control" required>
                                                <option value="<?= $gl->status_peserta ?>"><?= $gl->status_peserta ?></option>
                                                <option value="SISWA">SISWA</option>
                                                <option value="GURU">GURU</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if ($this->session->userdata('level') === '0'): ?>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-danger">Status Presensi*</label>
                                                <select name="status_presensi" id="status_presensi" class="form-control is-invalid" required>
                                                    <option value="<?= $gl->status_presensi ?>"><?= $gl->status_presensi ?></option>
                                                    <option value="PREPARE">PREPARE</option>
                                                    <option value="SUCCESS">SUCCESS</option>
                                                    <option value="FAILED">FAILED</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php elseif ($this->session->userdata('level') === '1'): ?>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-danger">Status Presensi*</label>
                                                <select name="status_presensi" id="status_presensi" class="form-control is-invalid" required>
                                                    <option value="<?= $gl->status_presensi ?>"><?= $gl->status_presensi ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin Data Sudah Benar? Harap perhatikan kembali isian data untuk menghindari terjadinya sistem eror.')">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($get_live as $gl): ?>
            <div class="modal fade" id="view_present<?= $gl->id_peserta ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <span class="h5 font-weight-bold modal-title">Detail Present</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Waktu Present</label>
                                        <input type="datetime-local" class="form-control" name="tgl_present" value="<?= $gl->tgl_present ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
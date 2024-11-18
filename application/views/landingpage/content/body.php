<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- <div class="d-flex justify-content-center" style="margin-bottom: -10px;margin-top: -10px;">
                <img src="<?= base_url('assets/image/partel.png') ?>" alt="Partel" style="width: 5%;" class="align-middle">
            </div> -->
            <div class="container-fluid">
                <!-- Title and Subtitle -->
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <h1 class="m-0 font-weight-bold" style="font-size: 25px;">Live Presensi Kehadiran</h1>
                        <span class="p text-navy" style="font-size: 15px;">SMK Pariwisata Telkom Bandung</span>
                    </div>

                    <div class="col-sm-2">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-success m-0 font-weight-bold">REKAP HADIR</p>
                            </div>
                            <div class="card-body">
                                <h4 class="m-0 font-weight-bold text-center" id="success_count">
                                    <!-- Jumlah peserta sukses akan muncul di sini -->
                                    -
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Card for PREPARE Status -->
                    <div class="col-sm-2">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-danger m-0 font-weight-bold">REKAP BELUM HADIR</p>
                            </div>
                            <div class="card-body">
                                <h4 class="m-0 font-weight-bold text-center" id="prepare_count">
                                    <!-- Jumlah peserta prepare akan muncul di sini -->
                                    -
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Image on the Right -->
                    <div class="col-sm-4 d-flex justify-content-end">
                        <img src="<?= base_url('assets/image/Judul.png') ?>" alt="Heading_Summer" style="width: 60%;" class="align-middle mr-3">
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-navy">
                        <table id="example1" class="table table-bordered table-striped compact-table" style="color: black !important;">
                            <thead class="text-center">
                                <tr class="text-uppercase text-white align-center">
                                    <th class="align-middle bg-navy">Nama Lengkap</th>
                                    <th class="align-middle bg-navy">Kelas</th>
                                    <th class="align-middle bg-navy">Plotting</th>
                                    <th class="align-middle bg-navy">Keterangan</th>
                                    <th class="align-middle bg-navy">Status Presensi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($get_live as $gl) : ?>
                                    <tr>
                                        <td>
                                            <?= $gl->nama_lengkap ?>
                                            <?php
                                            $tanggal = date('Y-m-d');
                                            if ($gl->tgl_input == $tanggal):
                                            ?>
                                                <span class="right badge badge-success">*</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $gl->kelas ?></td>
                                        <td><?= $gl->plotting ?></td>
                                        <td><?= $gl->status_peserta ?></td>
                                        <td>
                                            <?php
                                            $class = 'secondary';
                                            if ($gl->status_presensi == 'PREPARE') {
                                                $text = 'Belum Hadir';
                                                $class = 'danger';
                                            } elseif ($gl->status_presensi == 'SUCCESS') {
                                                $text = 'Hadir';
                                                $class = 'success';
                                            } elseif ($gl->status_presensi == 'FAILED') {
                                                $text = 'Gagal Hadir';
                                                $class = 'danger';
                                            }
                                            ?>
                                            <button type="button" class="btn btn-<?= $class ?> text-white"><?= $text ?></button>
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
</div>
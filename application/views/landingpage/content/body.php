<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- <div class="d-flex justify-content-center" style="margin-bottom: -10px;margin-top: -10px;">
                <img src="<?= base_url('assets/image/partel.png') ?>" alt="Partel" style="width: 5%;" class="align-middle">
            </div> -->
            <!-- <div class="d-flex justify-content-center mb-3 mt-3">
                <img src="<?= base_url('assets/image/Judul.png') ?>" alt="Heading_Summer" style="width: 25%;" class="align-middle">
            </div> -->
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="m-0 font-weight-bold" style="font-size: 25px;"> Live Presensi Kehadiran</h1> <span class="p text-navy" style="font-size: 15px;">SMK Pariwisata Telkom Bandung</span>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-navy card-outline">
                        <div class="card">
                            <div class="card-header">
                                <span class="p text-gray card-title" style="font-size: 12px;">After the user scans the barcode, the system automatically changes 'Status Presensi' to 'Already Present'.</span>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
                                                <td><?= $gl->nama_lengkap ?></td>
                                                <td><?= $gl->kelas ?></td>
                                                <td><?= $gl->plotting ?></td>
                                                <td><?= $gl->status_peserta ?></td>
                                                <td>
                                                    <?php
                                                    $class = 'secondary';
                                                    if ($gl->status_presensi == 'PREPARE') $class = 'warning';
                                                    elseif ($gl->status_presensi == 'SUCCESS') $class = 'success';
                                                    elseif ($gl->status_presensi == 'FAILED') $class = 'danger';
                                                    ?>
                                                    <button type="button" class="btn btn-<?= $class ?> btn-sm text-white"><?= $gl->status_presensi ?></button>
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
    </div>
</div>
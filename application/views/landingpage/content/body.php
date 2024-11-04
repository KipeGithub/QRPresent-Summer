<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"> Live Presensi Kehadiran</h1> <span class="p text-navy ">SMK Pariwisata Telkom Bandung</span>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
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
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr class="text-uppercase text-white align-center">
                                            <th class="align-middle bg-navy">NAMA LENGKAP</th>
                                            <th class="align-middle bg-navy">KELAS</th>
                                            <th class="align-middle bg-navy">PLOTTING</th>
                                            <th class="align-middle bg-navy">KETERANGAN</th>
                                            <th class="align-middle bg-navy">STATUS PRESENSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($get_live as $gl):
                                        ?>
                                            <tr>
                                                <td><?= $gl->nama_lengkap ?></td>
                                                <td><?= $gl->kelas ?></td>
                                                <td><?= $gl->plotting ?></td>
                                                <td><?= $gl->status_peserta ?></td>
                                                <td><?= $gl->status_presensi ?></td>
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
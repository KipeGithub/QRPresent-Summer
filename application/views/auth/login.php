<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> - PresensiSummer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/template-adm') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template-adm') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template-adm') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-color: #cea863;">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-navy">
            <div class="card-header text-center">
                <img src="<?= base_url('assets/image') ?>/LOGO_summer_scape.png" alt="Logo Summer" class="brand-image" style="width: 150px; height: auto;margin-top:2px;">
            </div>
            <div class="card-body">
                <p class="text-center">SummerScape Management System</p>
                <form action="<?= base_url('Auth/proses_login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- <p class="mb-1">
                    <a href="">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <script src="<?= base_url('assets/template-adm') ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/template-adm') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/template-adm') ?>/dist/js/adminlte.min.js"></script>
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
</body>

</html>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>

                </li>
                <li class="nav-item">

                    <a href="<?= base_url('Auth/logout'); ?>" class="nav-link" onclick="return confirm('Apakah anda yakin akan keluar dari sistem?')">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="align-middle">
                <img src="<?= base_url('assets/image') ?>/LOGO_summer_scape_2.png" alt="Logo Summer" class="brand-image align-center" style="width: 120px; height: auto;margin-left:60px;margin-top:20px;">
                <span class=" font-weight-light">&nbsp;</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <div class="nav-link mt-2" style="text-align:center; color: white;">
                    <center style="margin-bottom: 20px;">
                        <?php if (!empty($dosen['nama_dokumen'])) { ?>
                            <img src="<?= base_url('dokumen_foto_profile/' . $dosen['nama_dokumen']) ?>" class="img-circle elevation-2" alt="Avatar" style="border-radius: 50%;width: 180px;">
                        <?php } else { ?>
                            <img src="<?= base_url('assets/template-adm') ?>/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image" style="border-radius: 50%;width: 150px;">
                        <?php } ?>
                    </center>
                    <p style="font-size: 13px; margin-bottom: -10px;">
                        <b style="text-transform: uppercase;">
                            <div class="info">
                                <?php
                                $email = $this->session->userdata('email');
                                ?>
                                <?php if (!empty($email)) : ?>
                                    <p class="d-block"><?= $email; ?></p>
                                <?php else : ?>
                                    <p class="d-block">404</p>
                                <?php endif; ?>
                            </div>
                        </b>
                    </p>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Starter Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="nav-item ">
                            <a href="<?= base_url('admin?section=Dataset') ?>" class="nav-link <?php if ($this->input->get('section') === 'Dataset') echo 'active'; ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Dataset
                                    <span class="right badge badge-danger">Primary</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('admin/importdata?section=Import Data') ?>" class="nav-link <?php if ($this->input->get('section') === 'Import Data') echo 'active'; ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Import Data (.xls)
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('admin/scancam?section=Scan Absent') ?>" class="nav-link <?php if ($this->input->get('section') === 'Scan Absent') echo 'active'; ?>">
                                <i class="nav-icon fas fa-camera"></i>
                                <p>
                                    Scan Absent
                                </p>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('level') === '0'): ?>
                            <li class="nav-item ">
                                <a href="<?= base_url('admin/account_center?section=Center Account') ?>" class="nav-link <?php if ($this->input->get('section') === 'Center Account') echo 'active'; ?>">
                                    <i class="nav-icon far fa-address-book"></i>
                                    <p>
                                        Center Account
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 font-weight-bold"><?= $title ?> Menu</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if ($this->session->flashdata('toast')) : ?>
                        <script>
                            $(document).ready(function() {
                                var toastData = <?= json_encode($this->session->flashdata('toast')) ?>;
                                $(document).Toasts('create', {
                                    class: toastData.class,
                                    title: toastData.title,
                                    body: toastData.body
                                });
                            });
                        </script>
                    <?php endif; ?>
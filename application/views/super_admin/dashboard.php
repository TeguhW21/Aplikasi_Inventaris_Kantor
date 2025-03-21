<!doctype html>

<html
    lang="en"
    class="light-style layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= base_url(); ?>assets/"
    data-template="vertical-menu-template-free"
    data-style="light">
<?= $head ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?= $sidebar ?>
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="ri-menu-fill ri-24px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a
                                    class="nav-link dropdown-toggle hide-arrow p-0"
                                    href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 small"><?= $user['nama'] ?></h6>
                                                    <small class="text-muted"><?= $user['role'] ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ri-user-3-line ri-22px me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <div class="d-grid px-4 pt-2 pb-1">
                                            <a class="btn btn-danger d-flex" href="<?= base_url('Auth/Logout') ?>">
                                                <small class="align-middle">Logout</small>
                                                <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row gy-6">
                            <!-- Four Cards -->
                            <div class="col-xl-12 col-md-6">
                                <div class="row gy-6">
                                    <!--/ Total Profit line chart -->
                                    <!-- Total Profit Weekly Project -->
                                    <div class="col-sm-3">
                                        <div class="card h-100">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="avatar">
                                                    <div class="avatar-initial bg-secondary rounded-circle shadow-xs">
                                                        <i class="ri-pie-chart-2-line ri-24px"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-1">Jumlah Barang</h6>
                                                <div class="d-flex flex-wrap mb-1 align-items-center">
                                                    <h4 class="mb-0 me-2"><?= $total_barang ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card h-100">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="avatar">
                                                    <div class="avatar-initial bg-secondary rounded-circle shadow-xs">
                                                        <i class="ri-pie-chart-2-line ri-24px"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-1">Jumlah Barang Belum dialokasikan</h6>
                                                <div class="d-flex flex-wrap mb-1 align-items-center">
                                                    <h4 class="mb-0 me-2"><?= $total_barang_belum_dialokasikan ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card h-100">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="avatar">
                                                    <div class="avatar-initial bg-secondary rounded-circle shadow-xs">
                                                        <i class="ri-pie-chart-2-line ri-24px"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-1">Total Barang Rusak</h6>
                                                <div class="d-flex flex-wrap mb-1 align-items-center">
                                                    <h4 class="mb-0 me-2"><?= $total_barang_rusak ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card h-100">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="avatar">
                                                    <div class="avatar-initial bg-secondary rounded-circle shadow-xs">
                                                        <i class="ri-pie-chart-2-line ri-24px"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-1">Jumlah Barang Perlu Diperbaiki</h6>
                                                <div class="d-flex flex-wrap mb-1 align-items-center">
                                                    <h4 class="mb-0 me-2"><?= $total_barang_perlu_diperbaiki ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Total Profit Weekly Project -->

                                </div>
                            </div>
                            <!--/ Total Earning -->

                            <!-- Data Tables -->
                            <div class="col-12">
                                <div class="card overflow-hidden">
                                    <div class="table-responsive m-5">
                                        <table class="datatable table table-sm">
                                            <thead>
                                                <tr>
                                                    <th class="text-truncate">No</th>
                                                    <th class="text-truncate">Nama</th>
                                                    <th class="text-truncate">Role</th>
                                                    <th class="text-truncate">Cabang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($admin_cabang as $adc) : ?>
                                                    <tr>
                                                        <td class="text-truncate"><?= $no++ ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <h6 class="mb-0 text-truncate"><?= $adc['nama'] ?></h6>
                                                                    <small class="text-truncate"><?= $adc['email'] ?></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-truncate">
                                                            <div class="d-flex align-items-center">
                                                                <span><?= $adc['role'] ?></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-truncate">
                                                            <div class="d-flex align-items-center">
                                                                <span><?= $adc['nama_cabang'] ?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Data Tables -->
                        </div>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?= $script ?>

</body>

</html>
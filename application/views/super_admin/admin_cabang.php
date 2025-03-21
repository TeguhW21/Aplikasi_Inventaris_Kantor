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
                            <!-- Data Tables -->
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary mb-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalTambah">Tambah</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Admin Cabang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= site_url('Super_Admin/Admin_Cabang/add') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Admin" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email Admin" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" id="password" name="password" placeholder="Masukan Password Admin" class="form-control" required minlength="6">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cabang_id" class="form-label">Cabang</label>
                                                        <select id="cabang_id" name="cabang_id" class="form-select" required>
                                                            <option value="" disabled selected>Pilih Cabang</option>
                                                            <?php foreach ($cabang as $c) : ?>
                                                                <option value="<?= $c['id']; ?>"><?= $c['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <h5 class="card-header">Data Admin Cabang</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="datatable table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Cabang</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($admin_cabang as $adc) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $adc['nama'] ?></td>
                                                            <td><?= $adc['nama_cabang'] ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="ri-more-2-line"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#ModalEdit-<?= $adc['id'] ?>"><i class="ri-pencil-line me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" onclick="confirmDelete('<?= site_url('Super_Admin/Admin_Cabang/delete/' . $adc['id']); ?>')"><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <?php foreach ($admin_cabang as $adc) : ?>
                                                        <div class="modal fade" id="ModalEdit-<?= $adc['id'] ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Admin Cabang</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?= site_url('Super_Admin/Admin_Cabang/update/' . $adc['id']) ?>" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="nama-<?= $adc['id'] ?>" class="form-label">Nama</label>
                                                                                <input type="text" id="nama-<?= $adc['id'] ?>" name="nama" class="form-control" value="<?= $adc['nama'] ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="email-<?= $adc['id'] ?>" class="form-label">Email</label>
                                                                                <input type="email" id="email-<?= $adc['id'] ?>" name="email" class="form-control" value="<?= $adc['email'] ?>" readonly>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="password-<?= $adc['id'] ?>" class="form-label">Ubah Password (Opsional)</label>
                                                                                <input type="password" id="password-<?= $adc['id'] ?>" name="password" class="form-control" placeholder="Isi jika ingin mengganti password">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="cabang_id-<?= $adc['id'] ?>" class="form-label">Cabang</label>
                                                                                <select id="cabang_id-<?= $adc['id'] ?>" name="cabang_id" class="form-select" required>
                                                                                    <option value="" disabled>Pilih Cabang</option>
                                                                                    <?php foreach ($cabang as $c) : ?>
                                                                                        <option value="<?= $c['id']; ?>" <?= ($c['id'] == $adc['cabang_id']) ? 'selected' : ''; ?>>
                                                                                            <?= $c['nama']; ?>
                                                                                        </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
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
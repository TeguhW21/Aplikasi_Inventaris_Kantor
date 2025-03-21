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

                                <div class="card">
                                    <h5 class="card-header">Data Barang</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="datatable table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Foto</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Kondisi</th>
                                                        <th>Lokasi</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($barang as $br) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td>
                                                                <img src="<?= base_url('assets/upload/foto_barang/' . $br['foto']) ?>"
                                                                    alt="Gambar Barang"
                                                                    width="50" height="50"
                                                                    style="object-fit: cover; border-radius: 5px;">
                                                            </td>
                                                            <td><?= $br['nama'] ?></td>
                                                            <td><?= $br['nama_kategori'] ?></td>
                                                            <td>
                                                                <?php
                                                                $warna = "";
                                                                if ($br['kondisi'] == "Baik") {
                                                                    $warna = "text-success";
                                                                } elseif ($br['kondisi'] == "Rusak") {
                                                                    $warna = "text-danger";
                                                                } elseif ($br['kondisi'] == "Perlu Perbaikan") {
                                                                    $warna = "text-warning";
                                                                }
                                                                ?>
                                                                <span class="<?= $warna; ?>"><?= $br['kondisi']; ?></span>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                if (!empty($br['nama_cabang']) && !empty($br['nama_gedung']) && !empty($br['nama_lantai']) && !empty($br['nama_ruangan'])) {
                                                                    echo "{$br['nama_cabang']}, {$br['nama_gedung']}, {$br['nama_lantai']}, {$br['nama_ruangan']}";
                                                                } else {
                                                                    echo "<span class='text-danger'>Belum Dialokasikan</span>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="ri-more-2-line"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalDetail-<?= $br['id'] ?>"><i class="ri-pencil-line me-1"></i> Detail</a>
                                                                        <a class="dropdown-item"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalEdit-<?= $br['id'] ?>"><i class="ri-pencil-line me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" href="<?= base_url('Admin_Cabang/Alokasi/action/' . $br['id']) ?>"><i class="ri-pencil-line me-1"></i> Alokasi</a>
                                                                        <a class="dropdown-item" href="<?= base_url('Admin_Cabang/History/alokasi/' . $br['id']) ?>"><i class="ri-pencil-line me-1"></i> History Alokasi</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="modalEdit-<?= $br['id'] ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Barang</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?= site_url('Admin_Cabang/Barang/update/' . $br['id']) ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12 mb-3 d-flex flex-column align-items-center">
                                                                                    <label class="form-label text-center">Foto Barang Saat Ini</label>
                                                                                    <img src="<?= base_url('assets/upload/foto_barang/' . $br['foto']) ?>"
                                                                                        alt="Foto Barang"
                                                                                        class="img-thumbnail"
                                                                                        width="150">
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="nama" class="form-label">Nama Barang</label>
                                                                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $br['nama'] ?>" required>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="kategori_id" class="form-label">Kategori</label>
                                                                                    <select class="form-control" name="kategori_id" required>
                                                                                        <option value="">-- Pilih Kategori --</option>
                                                                                        <?php foreach ($kategori as $kat) : ?>
                                                                                            <option value="<?= $kat['id'] ?>" <?= $kat['id'] == $br['kategori_id'] ? 'selected' : '' ?>>
                                                                                                <?= $kat['nama'] ?>
                                                                                            </option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="kondisi" class="form-label">Kondisi</label>
                                                                                    <select class="form-control" name="kondisi" required>
                                                                                        <option value="Baik" <?= $br['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                                                                                        <option value="Rusak" <?= $br['kondisi'] == 'Rusak' ? 'selected' : '' ?>>Rusak</option>
                                                                                        <option value="Perlu Perbaikan" <?= $br['kondisi'] == 'Perlu Perbaikan' ? 'selected' : '' ?>>Perlu Perbaikan</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="harga" class="form-label">Harga</label>
                                                                                    <input type="number" id="harga" name="harga" class="form-control" value="<?= $br['harga'] ?>" required>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                                                                                    <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="form-control" value="<?= $br['tanggal_pembelian'] ?>" required>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                                    <textarea name="deskripsi" class="form-control" rows="3" required><?= $br['deskripsi'] ?></textarea>
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                    <label for="foto" class="form-label">Foto Barang</label>
                                                                                    <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
                                                                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                                Close
                                                                            </button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <!-- Modal Detail Barang (Diletakkan di luar loop) -->
                                            <?php foreach ($barang as $br) : ?>
                                                <div class="modal fade" id="modalDetail-<?= $br['id'] ?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Barang</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <!-- Gambar Barang -->
                                                                    <div class="col-md-4 text-center">
                                                                        <img src="<?= base_url('assets/upload/foto_barang/' . $br['foto']) ?>"
                                                                            alt="Foto Barang" class="img-fluid img-thumbnail" style="max-width: 100%; height: auto;">
                                                                    </div>
                                                                    <!-- Detail Barang -->
                                                                    <div class="col-md-8">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th>Nama Barang</th>
                                                                                <td><?= $br['nama'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Kategori</th>
                                                                                <td><?= $br['nama_kategori'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Kondisi</th>
                                                                                <td><?= $br['kondisi'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Harga</th>
                                                                                <td>Rp <?= number_format($br['harga'], 0, ',', '.') ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Tanggal Pembelian</th>
                                                                                <td><?= date('d-m-Y', strtotime($br['tanggal_pembelian'])) ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Deskripsi</th>
                                                                                <td><?= $br['deskripsi'] ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
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
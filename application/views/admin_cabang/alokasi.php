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
                                    <h5 class="card-header">Alokasi Barang </h5>
                                    <form action="<?= site_url('Admin_Cabang/Alokasi/' . ($alokasi ? 'update/' . $alokasi['id'] : 'add')) ?>" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="hidden" name="barang_id" value="<?= $barang['id'] ?>">
                                                <input type="text" class="form-control" value="<?= $barang['nama'] ?>" disabled />
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Nama User</label>
                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                <input type="text" class="form-control" value="<?= $user['nama'] ?>" disabled />
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Cabang</label>
                                                <input type="hidden" name="cabang_id" value="<?= $user['cabang_id'] ?>">
                                                <input type="text" class="form-control" value="<?= $user['nama_cabang'] ?>" disabled />
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Gedung</label>
                                                <select class="form-select" name="gedung_id" id="gedung_id">
                                                    <option value="">-- Pilih Gedung --</option>
                                                    <?php foreach ($gedung as $gd) : ?>
                                                        <option value="<?= $gd['id'] ?>" <?= ($alokasi && $alokasi['gedung_id'] == $gd['id']) ? 'selected' : '' ?>>
                                                            <?= $gd['nama'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Lantai</label>
                                                <select class="form-select" name="lantai_id" id="lantai_id">
                                                    <option value="">-- Pilih Lantai --</option>
                                                    <?php foreach ($lantai as $lt) : ?>
                                                        <option value="<?= $lt['id'] ?>" <?= ($alokasi && $alokasi['lantai_id'] == $lt['id']) ? 'selected' : '' ?>>
                                                            <?= $lt['nama'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Ruangan</label>
                                                <select class="form-select" name="ruangan_id" id="ruangan_id">
                                                    <option value="">-- Pilih Ruangan --</option>
                                                    <?php foreach ($ruangan as $rg) : ?>
                                                        <option value="<?= $rg['id'] ?>" <?= ($alokasi && $alokasi['ruangan_id'] == $rg['id']) ? 'selected' : '' ?>>
                                                            <?= $rg['nama'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-<?= $alokasi ? 'warning' : 'primary' ?> mt-3">
                                                    <?= $alokasi ? 'Update' : 'Alokasikan' ?>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
    <script>
        $(document).ready(function() {
            let cabangId = $("input[name='cabang_id']").val();
            let selectedGedungId = "<?= $alokasi ? $alokasi['gedung_id'] : '' ?>";
            let selectedLantaiId = "<?= $alokasi ? $alokasi['lantai_id'] : '' ?>";
            let selectedRuanganId = "<?= $alokasi ? $alokasi['ruangan_id'] : '' ?>";

            function loadGedung() {
                console.log("Mengambil gedung untuk cabang:", cabangId); // Debugging

                $.ajax({
                    url: "<?= site_url('Admin_Cabang/Alokasi/get_gedung_by_cabang') ?>",
                    type: "POST",
                    data: {
                        cabang_id: cabangId
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log("Data gedung diterima:", data); // Debugging
                        let options = '<option value="">-- Pilih Gedung --</option>';

                        $.each(data, function(index, value) {
                            let selected = (value.id == selectedGedungId) ? 'selected' : '';
                            options += `<option value="${value.id}" ${selected}>${value.nama}</option>`;
                        });

                        $("#gedung_id").html(options);

                        // Jika ada gedung yang terpilih sebelumnya, langsung muat lantainya
                        if (selectedGedungId) {
                            loadLantai(selectedGedungId);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Gagal mengambil data gedung:", error);
                    }
                });
            }

            function loadLantai(gedungId) {
                console.log("Mengambil lantai untuk gedung:", gedungId);

                $.ajax({
                    url: "<?= site_url('Admin_Cabang/Alokasi/get_lantai_by_gedung') ?>",
                    type: "POST",
                    data: {
                        gedung_id: gedungId
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log("Data lantai diterima:", data);
                        let options = '<option value="">-- Pilih Lantai --</option>';

                        $.each(data, function(index, value) {
                            let selected = (value.id == selectedLantaiId) ? 'selected' : '';
                            options += `<option value="${value.id}" ${selected}>${value.nama}</option>`;
                        });

                        $("#lantai_id").html(options);

                        // Jika ada lantai yang terpilih sebelumnya, langsung muat ruangannya
                        if (selectedLantaiId) {
                            loadRuangan(selectedLantaiId);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Gagal mengambil data lantai:", error);
                    }
                });
            }

            function loadRuangan(lantaiId) {
                console.log("Mengambil ruangan untuk lantai:", lantaiId);

                $.ajax({
                    url: "<?= site_url('Admin_Cabang/Alokasi/get_ruangan_by_lantai') ?>",
                    type: "POST",
                    data: {
                        lantai_id: lantaiId
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log("Data ruangan diterima:", data);
                        let options = '<option value="">-- Pilih Ruangan --</option>';

                        $.each(data, function(index, value) {
                            let selected = (value.id == selectedRuanganId) ? 'selected' : '';
                            options += `<option value="${value.id}" ${selected}>${value.nama}</option>`;
                        });

                        $("#ruangan_id").html(options);
                    },
                    error: function(xhr, status, error) {
                        console.error("Gagal mengambil data ruangan:", error);
                    }
                });
            }

            $("#gedung_id").on("change", function() {
                loadLantai($(this).val());
            });

            $("#lantai_id").on("change", function() {
                loadRuangan($(this).val());
            });

            // Jalankan loadGedung() saat halaman dimuat
            loadGedung();
        });
    </script>
</body>

</html>
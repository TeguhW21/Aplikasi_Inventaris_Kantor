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
                                                <h5 class="modal-title" id="modalTambahTitle">Tambah Ruangan</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?= site_url('Super_Admin/Ruangan/add') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 mb-6 mt-2">
                                                            <div class="form-floating form-floating-outline">
                                                                <select class="form-select" name="cabang_id" id="cabang_id_tambah">
                                                                    <option value="">-- Pilih Cabang --</option>
                                                                    <?php foreach ($cabang as $cb) : ?>
                                                                        <option value="<?= $cb['id'] ?>"><?= $cb['nama'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <label for="Cabang">Cabang</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-6 mt-2">
                                                            <div class="form-floating form-floating-outline">
                                                                <select class="form-select" name="gedung_id" id="gedung_id_tambah">
                                                                    <option value="">-- Pilih Gedung --</option>
                                                                </select>
                                                                <label for="Gedung">Gedung</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-6 mt-2">
                                                            <div class="form-floating form-floating-outline">
                                                                <select class="form-select" name="lantai_id" id="lantai_id_tambah">
                                                                    <option value="">-- Pilih Lantai --</option>
                                                                </select>
                                                                <label for="Lantai">Lantai</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-6 mt-2">
                                                            <div class="form-floating form-floating-outline">
                                                                <input
                                                                    type="text"
                                                                    id="nama"
                                                                    name="nama"
                                                                    class="form-control"
                                                                    placeholder="Enter Name" />
                                                                <label for="nama">Nama Ruangan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <h5 class="card-header">Data Ruangan</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="datatable table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Cabang</th>
                                                        <th>Nama Gedung</th>
                                                        <th>Nama Lantai</th>
                                                        <th>Nama Ruangan</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($ruangan as $rg) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $rg['nama_cabang'] ?></td>
                                                            <td><?= $rg['nama_gedung'] ?></td>
                                                            <td><?= $rg['nama_lantai'] ?></td>
                                                            <td><?= $rg['nama'] ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="ri-more-2-line"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#ModalEdit-<?= $rg['id'] ?>"
                                                                            data-cabang="<?= $rg['cabang_id'] ?>"
                                                                            data-gedung="<?= $rg['gedung_id'] ?>"
                                                                            data-lantai="<?= $rg['lantai_id'] ?>">
                                                                            <i class="ri-pencil-line me-1"></i> Edit
                                                                        </a>

                                                                        <a class="dropdown-item" onclick="confirmDelete('<?= site_url('Super_Admin/Ruangan/delete/' . $rg['id']); ?>')"><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="ModalEdit-<?= $rg['id'] ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalEditTitle">Edit Lantai</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="<?= site_url('Super_Admin/Ruangan/update/' . $rg['id']) ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12 mb-6 mt-2">
                                                                                    <div class="form-floating form-floating-outline">
                                                                                        <select class="form-select" name="cabang_id" id="cabang_id_edit">
                                                                                            <option value="">-- Pilih Cabang --</option>
                                                                                            <?php foreach ($cabang as $cb) : ?>
                                                                                                <option value="<?= $cb['id'] ?>" <?= ($cb['id'] == $rg['cabang_id']) ? 'selected' : '' ?>>
                                                                                                    <?= $cb['nama'] ?>
                                                                                                </option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                        <label for="cabang_id_edit">Cabang</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 mb-6 mt-2">
                                                                                    <div class="form-floating form-floating-outline">
                                                                                        <select class="form-select" name="gedung_id" id="gedung_id_edit">
                                                                                            <option value="">-- Pilih Gedung --</option>
                                                                                        </select>
                                                                                        <label for="gedung_id_edit">Gedung</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 mb-6 mt-2">
                                                                                    <div class="form-floating form-floating-outline">
                                                                                        <select class="form-select" name="lantai_id" id="lantai_id_edit">
                                                                                            <option value="">-- Pilih Lantai --</option>
                                                                                        </select>
                                                                                        <label for="lantai_id_edit">Lantai</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 mb-6 mt-2">
                                                                                    <div class="form-floating form-floating-outline">
                                                                                        <input type="text" id="nama" name="nama" class="form-control" value="<?= $rg['nama'] ?>" placeholder="Enter Name">
                                                                                        <label for="nama">Nama Ruangan</label>
                                                                                    </div>
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
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat gedung berdasarkan cabang
            function loadGedung(cabangId, targetGedung, selectedGedungId = null) {
                $.ajax({
                    url: "<?= site_url('Super_Admin/Ruangan/get_gedung_by_cabang') ?>",
                    type: "POST",
                    data: {
                        cabang_id: cabangId
                    },
                    dataType: "json",
                    success: function(data) {
                        var options = '<option value="">-- Pilih Gedung --</option>';
                        $.each(data, function(index, value) {
                            var selected = (value.id == selectedGedungId) ? 'selected' : '';
                            options += '<option value="' + value.id + '" ' + selected + '>' + value.nama + '</option>';
                        });

                        $(targetGedung).html(options).prop('disabled', false);

                        // HAPUS pemanggilan loadLantai() di sini!!
                    },
                    error: function() {
                        alert("Gagal mengambil data gedung.");
                    }
                });
            }


            // Fungsi untuk memuat lantai berdasarkan gedung
            function loadLantai(gedungId, targetLantai, selectedLantaiId = null) {

                $.ajax({
                    url: "<?= site_url('Super_Admin/Ruangan/get_lantai_by_gedung') ?>",
                    type: "POST",
                    data: {
                        gedung_id: gedungId
                    },
                    dataType: "json",
                    success: function(data) {
                        var options = '<option value="">-- Pilih Lantai --</option>';
                        $.each(data, function(index, value) {
                            var selected = (selectedLantaiId && value.id == selectedLantaiId) ? 'selected' : '';
                            options += '<option value="' + value.id + '" ' + selected + '>' + value.nama + '</option>';
                        });

                        $(targetLantai).html(options).prop('disabled', false);

                        if (selectedLantaiId && selectedLantaiId !== "") {
                            $(targetLantai).val(selectedLantaiId);
                        }
                    },
                    error: function() {
                        alert("Gagal mengambil data lantai.");
                    }
                });
            }


            // Saat modal tambah/edit dibuka, isi dropdown berdasarkan cabang yang tersimpan
            $(document).on('show.bs.modal', '[id^="ModalEdit-"], #modalTambah', function(event) {
                var button = $(event.relatedTarget); // Tombol yang diklik
                var modal = $(this); // Modal yang sedang dibuka
                var cabangId = button.data('cabang') || ''; // Ambil cabang_id dari tombol
                var gedungId = button.data('gedung') || ''; // Ambil gedung_id dari tombol
                var lantaiId = button.data('lantai') || ''; // Ambil lantai_id dari tombol


                modal.find('[id^="cabang_id"]').val(cabangId); // Set cabang tanpa trigger change
                loadGedung(cabangId, modal.find('[id^="gedung_id"]'), gedungId); // Load gedung
                if (gedungId) {
                    loadLantai(gedungId, modal.find('[id^="lantai_id"]'), lantaiId); // Load lantai jika gedung ada
                }
            });

            // Saat cabang berubah
            $(document).on('change', '[id^="cabang_id"]', function() {
                var modal = $(this).closest('.modal'); // Cari modal terdekat
                var cabangId = $(this).val(); // Ambil nilai cabang
                var targetGedung = modal.find('[id^="gedung_id"]'); // Target dropdown gedung
                var targetLantai = modal.find('[id^="lantai_id"]'); // Target dropdown lantai

                loadGedung(cabangId, targetGedung);
                targetLantai.html('<option value="">-- Pilih Lantai --</option>').prop('disabled', true); // Reset lantai
            });

            // Saat gedung berubah
            $(document).on('change', '[id^="gedung_id"]', function() {
                var modal = $(this).closest('.modal'); // Cari modal terdekat
                var gedungId = $(this).val(); // Ambil nilai gedung
                var targetLantai = modal.find('[id^="lantai_id"]'); // Target dropdown lantai
                loadLantai(gedungId, targetLantai);
            });
        });
    </script>

</body>

</html>
<!-- Core JS -->
<script src="<?= base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url(); ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?= base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url(); ?>assets/vendor/js/menu.js"></script>

<!-- Vendors JS -->
<script src="<?= base_url(); ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>


<!-- Main JS -->
<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboards-analytics.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true
        });
    });

    function confirmDelete(url) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!",
            text: '<?= $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= $this->session->flashdata('error'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>
</script>
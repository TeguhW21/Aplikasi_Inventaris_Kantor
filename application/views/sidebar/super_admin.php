<?php
$segment1 = $this->uri->segment(2);
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Inventaris</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item <?= ($segment1 == 'Dashboard') ? 'active open' : ''; ?>">
            <a href="<?= base_url('Super_Admin/Dashboard') ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Basic">Dashboard</div>
            </a>
        </li>

        <li class="menu-header mt-7">
            <span class="menu-header-text">Data</span>
        </li>
        <li class="menu-item <?= ($segment1 == 'Admin_Cabang') ? 'active open' : ''; ?>">
            <a href="<?= base_url('Super_Admin/Admin_Cabang') ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-folder-6-line"></i>
                <div data-i18n="Basic">Admin Cabang</div>
            </a>
        </li>
        <li class="menu-item <?= ($segment1 == 'Kategori') ? 'active open' : ''; ?>">
            <a href="<?= base_url('Super_Admin/Kategori') ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-folder-6-line"></i>
                <div data-i18n="Basic">Kategori Barang</div>
            </a>
        </li>
        </li>

        <li class="menu-item <?= (in_array($segment1, ['Cabang', 'Gedung', 'Lantai', 'Ruangan'])) ? 'open' : ''; ?>">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-folder-6-line"></i>
                <div data-i18n="User interface">Lokasi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= ($segment1 == 'Cabang') ? 'active' : ''; ?>">
                    <a href="<?= base_url('Super_Admin/Cabang') ?>" class="menu-link">
                        <div data-i18n="Accordion">Cabang</div>
                    </a>
                </li>
                <li class="menu-item <?= ($segment1 == 'Gedung') ? 'active' : ''; ?>">
                    <a href="<?= base_url('Super_Admin/Gedung') ?>" class="menu-link">
                        <div data-i18n="Alerts">Gedung</div>
                    </a>
                </li>
                <li class="menu-item <?= ($segment1 == 'Lantai') ? 'active' : ''; ?>">
                    <a href="<?= base_url('Super_Admin/Lantai') ?>" class="menu-link">
                        <div data-i18n="Badges">Lantai</div>
                    </a>
                </li>
                <li class="menu-item <?= ($segment1 == 'Ruangan') ? 'active' : ''; ?>">
                    <a href="<?= base_url('Super_Admin/Ruangan') ?>" class="menu-link">
                        <div data-i18n="Badges">Ruangan</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?= ($segment1 == 'Barang') ? 'active open' : ''; ?>">
            <a href="<?= base_url('Super_Admin/Barang') ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-folder-6-line"></i>
                <div data-i18n="Basic">Barang</div>
            </a>
        </li>

    </ul>
</aside>
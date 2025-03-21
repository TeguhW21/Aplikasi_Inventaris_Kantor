<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Inventaris</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item <?= ($segment1 == 'Dashboard') ? 'active open' : ''; ?>">
            <a href="<?= base_url('Admin_Cabang/Dashboard') ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Basic">Dashboard</div>
            </a>
        </li>

        <li class="menu-header mt-7">
            <span class="menu-header-text">Data</span>
        </li>
        <li class="menu-item <?= ($segment1 == 'Barang') ? 'active open' : ''; ?>">
            <a href="<?= base_url('Admin_Cabang/Barang') ?>" class="menu-link">
                <i class="menu-icon tf-icons ri-folder-6-line"></i>
                <div data-i18n="Basic">Barang</div>
            </a>
        </li>

    </ul>
</aside>
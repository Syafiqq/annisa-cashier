<div id="sidebar" class="nav-collapse collapse">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
            <input type="text" class="search-query" placeholder="Search"/>
        </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="sidebar-menu">
        <li class="has-sub ">
            <a href="<?php echo base_url() ?>admin/index" class="">
                <span class="icon-box"> <i class="icon-dashboard"></i></span>
                Beranda
            </a>
        </li>
        <li class="has-sub">
            <a href="<?php echo base_url() ?>admin/produk" class="">
                <span class="icon-box"> <i class="icon-glass"></i></span>
                Produk
            </a>
        </li>
        <li class="has-sub">
            <a href="javascript:" class="">
                <span class="icon-box"><i class="icon-shopping-cart"></i></span>
                Stok
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class="<?php if ($this->uri->segment(2) == '')
                {
                    echo "active";
                } ?>">
                    <a href="<?php echo base_url() ?>admin/bahanBaku">Bahan Baku</a>
                </li>
                <li class="<?php if ($this->uri->segment(2) == '')
                {
                    echo "active";
                } ?>">
                    <a href="<?php echo base_url() ?>admin/stokMasuk">Stok Masuk</a>
                </li>
                <li class="<?php if ($this->uri->segment(2) == '')
                {
                    echo "active";
                } ?>">
                    <a href="<?php echo base_url() ?>admin/stokKeluar">Stok Keluar</a>
                </li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="<?php echo base_url() ?>admin/Pengeluaran" class="">
                <span class="icon-box"> <i class="icon-tags"></i></span>
                Pengeluaran
            </a>
        </li>
        <li class="has-sub">
            <a href="<?php echo base_url() ?>admin/outlet" class="">
                <span class="icon-box"><i class="icon-map-marker"></i></span>
                Outlet
            </a>
        </li>
        <li class="has-sub">
            <a href="javascript:" class="">
                <span class="icon-box"><i class="icon-book"></i></span>
                Laporan
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class="<?php if ($this->uri->segment(2) == '')
                {
                    echo "active";
                } ?>">
                    <a href="<?php echo base_url() ?>admin/laporanPenjualan">Laporan Penjualan</a>
                </li>
                <li class="<?php if ($this->uri->segment(2) == '')
                {
                    echo "active";
                } ?>">
                    <a href="<?php echo base_url() ?>admin/laporan/produk">Laporan Produk</a>
                </li>
                <li class="<?php if ($this->uri->segment(2) == '')
                {
                    echo "active";
                } ?>">
                    <a href="<?php echo base_url() ?>admin/laporanStok">Laporan Stok</a>
                </li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="<?php echo base_url() ?>admin/user" class="">
                <span class="icon-box"><i class="icon-group"></i></span>
                Data User
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>

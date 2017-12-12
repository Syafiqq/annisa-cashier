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
            <a href="<?php echo base_url() ?>admin" class="">
                <span class="icon-box"> <i class="icon-dashboard"></i></span>
                Beranda

            </a>
        </li>
        <li class="has-sub">
            <a href="javascript:" class="">
                <span class="icon-box"> <i class="icon-glass"></i></span>
                Produk
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li>
                    <a class="" href="<?php echo base_url() ?>produk">Daftar Produk</a>
                </li>
                <li>
                    <a class="" href="<?php echo base_url() ?>produk/produkPopuler">Produk Populer</a>
                </li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:" class="">
                <span class="icon-box"><i class="icon-inbox"></i></span>
                Stok
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li>
                    <a class="" href="<?php echo base_url() ?>stok">Stok Produk</a>
                </li>
                <li>
                    <a class="" href="<?php echo base_url() ?>stok/stokSambel">Arsip Stok Sambel Pecel</a>
                </li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:" class="">
                <span class="icon-box"><i class="icon-book"></i></span>
                Laporan
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li>
                    <a class="" href="<?php echo base_url() ?>laporan">Laporan Penjualan Perstruk</a>
                </li>
                <li>
                    <a class="" href="<?php echo base_url() ?>laporanPerbulan">Laporan Penjualan Perbulan</a>
                </li>
                <li>
                    <a class="" href="<?php echo base_url() ?>laporanUang">Laporan Uang Masuk/Keluar</a>
                </li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="<?php echo base_url() ?>user" class="">
                <span class="icon-box"><i class="icon-group"></i></span>
                Data User
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>

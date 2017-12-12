<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Panel</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            blabla
                            <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="login.html">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="<?php if ($this->uri->segment(2) == '')
                    {
                        echo "active";
                    } ?>">
                        <a href="<?php echo site_url('admin') ?>">Beranda</a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle">Produk
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="<?php echo site_url('admin/produk'); ?>">Daftar Produk</a>
                            </li>
                            <li>
                                <a href="#">Produk Terpopuler</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Stok
                            <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Stok Produk</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Arsip Stok Sambel Pecel</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Laporan
                            <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Laporan Penjualan Perstruk</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Laporan Penjualan Perbulan</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Laporan Uang Masuk/Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#">Data User

                        </a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

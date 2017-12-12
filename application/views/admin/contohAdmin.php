<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Admin Home Page</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
<?php $this->load->view('admin/header.php') ?>
<div class="container-fluid">
    <div class="row-fluid">

        <!--/span-->
        <div class="span12" id="content">
            <div class="row-fluid">

                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="breadcrumb">
                            <i class="icon-chevron-left hide-sidebar">
                                <a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a>
                            </i>
                            <i class="icon-chevron-right show-sidebar" style="display:none;">
                                <a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a>
                            </i>
                            <li>
                                <a href="#">Beranda</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <?php
            $now   = new Datetime();
            $waktu = $now->format('l,d-m-Y');
            ?>
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><?php echo $waktu; ?> </div>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <div class="span2">


                    </div>
                    <div class="span2">

                        <div class="alert alert-info">
                            <strong> Total Transaksi.</strong>
                        </div>

                    </div>
                    <div class="span1">


                    </div>
                    <div class="span2">

                        <div class="alert alert-info">
                            <strong>Total Penjualan.</strong>
                        </div>
                    </div>
                    <div class="span1">


                    </div>
                    <div class="span2">

                        <div class="alert alert-info">
                            <strong>Laba Kotor.</strong>
                        </div>
                    </div>
                    <div class="span2">


                    </div>
                </div>

                <div class="block-content collapse in">
                    <div class="span3">

                        <div class="alert alert-info">
                            <strong> Grafik Penjualan Dalam</strong>
                        </div>

                    </div>
                    <div class="md-3">

                        <select class="minicombo"
                        "size="1" >
                        <option value="10" selected="selected">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        </select>
                    </div>
                    <div class="span1">


                    </div>
                    <div class="span2">

                        <div class="alert alert-info">
                            <strong>Laba Kotor.</strong>
                        </div>
                    </div>
                    <div class="span2">


                    </div>
                </div>

            </div>
            <!-- /block -->
            <hr>
            <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="<?php echo base_url(); ?>assets/vendors/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/scripts.js"></script>
        <script>
            $(function () {
                // Easy pie charts
                $('.chart').easyPieChart({animate: 1000});
            });
        </script>
</body>

</html>

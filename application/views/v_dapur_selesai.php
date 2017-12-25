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
<html lang="en"> <!--<![endif]-->
                 <!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>POS-Dapur</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="base-url" content="<?php echo base_url() ?>">
    <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color"/>
    <link href="<?php echo site_url(); ?>assets/css/bootstrap-dialog.min.css" rel="stylesheet"/>
    <style>
        div.queue-container {
            margin: 32px 0;
            padding-left: 32px;
        }

        div.queue-wrapper {
            vertical-align: top;
        }

        .dl-horizontal dt {
            margin-left: 32px;
            width: inherit;
        }

        .dl-horizontal dd {
            margin-left: 100px;
        }

        div.overflow_queue {
            overflow-x: auto;
            white-space: nowrap;
        }

        div.overflow_queue [class*="span"] { /* TWBS v2 */
            display: inline-block;
            float: none; /* Very important */
        }
    </style>
</head>
                 <!-- END HEAD -->
                 <!-- BEGIN BODY -->
<body id="login-body">
<div class="login-header">
    <?php $this->load->view('headerDapur.php') ?>
</div>
<div class="container-fluid" style="width: inherit; padding: 0 32px;">
    <div class="row-fluid">
        <div class="span12">
            <div class="queue-container">
                <div class="row">
                    <div class="overflow_queue">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pusher.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment-timezone-with-data.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-dialog.min.js"></script>
<script>
    jQuery(document).ready(function () {
        //App.initLogin();
    });
</script>
<!-- END JAVASCRIPTS -->
<script>
    (function ($) {
        $(function () {

            var s_ovr_qq = 'div.overflow_queue';
            var products = <?php echo json_encode(isset($products) ? $products : [])?>;
            var queues   = {};

            function viewQueue()
            {
                $(s_ovr_qq).find('div.queue-wrapper').remove();
                var i = -1;
                $.each(queues, function (qk, qv) {
                    var _r_template = '';
                    $.each(qv['pesanan'], function (rk, rv) {
                        _r_template += ''
                            //@formatter:off
                            + '<li>'
                            +   '<strong>[' + rv['diproses'] + '] ' + rv['jumlah'] + '</strong> ' + products['p_' + rv['id_produk']]['nama_produk']
                            + '</li>';
                            //@formatter:on
                    });

                    $(s_ovr_qq)
                        .append(''
                            //@formatter:off
                            +'<div class="span3 queue-wrapper">'
                            +    '<div class="pricing-table gray" style="background-color: whitesmoke">'
                            +        '<div class="pricing-head">'
                            +            '<h1><strong>'+(++i+1)+' [#' +qv['antrian'] + '] </strong></h1>'
                            +        '</div>'
                            +        '<div class="pricing-subhead">'
                            +            '<dl class="dl-horizontal" style="padding: 15px 0; margin: 0">'
                            +                '<dt>ID</dt>'
                            +                '<dd>#'+qv['id_tm']+'</dd>'
                            +                '<dt>Meja</dt>'
                            +                '<dd>'+(qv['no_meja'] == null ? 'Dibawa Pulang' : '#' + qv['no_meja'])+'</dd>'
                            +                '<dt>Antri</dt>'
                            +                '<dd>'+qv['antrian']+'</dd>'
                            +                '<dt>Pesan</dt>'
                            +                '<dd>'+moment(qv['tanggal'], "YYYY-MM-DD HH:mm:ss").tz('Asia/Jakarta').format('HH:mm:ss')+'</dd>'
                            +                '<dt>Saji</dt>'
                            +                '<dd>'+moment(qv['waktu_saji'], "YYYY-MM-DD HH:mm:ss").tz('Asia/Jakarta').format('HH:mm:ss')+'</dd>'
                            +                '<dt>Selesai</dt>'
                            +                '<dd>'+moment(qv['waktu_selesai'], "YYYY-MM-DD HH:mm:ss").tz('Asia/Jakarta').format('HH:mm:ss')+'</dd>'
                            +            '</dl>'
                            +        '</div>'
                            +        '<ul>'
                            +           _r_template
                            +        '</ul>'
                            +    '</div>'
                            +'</div>'
                            //@formatter:on
                        )
                    ;
                });
            }

            function loadQueue()
            {
                $.post(
                    $('meta[name=base-url]').attr('content') + 'api/dapur/finish',
                    null,
                    null,
                    'json')
                    .done(function (response) {
                        if (response !== undefined)
                        {
                            if ((response['r'] !== undefined) && (response['r']['pesanan'] !== undefined))
                            {
                                queues = response['r']['pesanan'];
                                viewQueue();
                            }
                        }
                    })
                    .fail(function (error) {
                    })
                    .always(function (error) {
                    });
            }

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('7dd372a2fbe222be06f6', {
                cluster: 'ap1',
                encrypted: true
            });

            var channel = pusher.subscribe('queue');
            channel.bind('finish_updated', function (data) {
                loadQueue()
            });

            loadQueue();
        });
        /*
         * Run right away
         * */
    })(jQuery);

</script>
<script type="text/javascript">if ((self === top) && false)
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

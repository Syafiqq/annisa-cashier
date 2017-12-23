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
            margin: 40px
        }

        div.request-container {
            margin: 40px 0;
            background: whitesmoke;
        }

        div.request-container, .table th, .table td {
            vertical-align: middle;
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
<button id="dummy-load" class="button">Load</button>
<div class="container" style="width: 100%">
    <div class="row">
        <div class="span12">
            <div class="queue-container">
                <div class="row">
                    <div class="overflow_queue">
                        <?php for ($i = -1, $is = 10; ++$i < $is;) { ?>
                            <div class="span3">
                                <div class="pricing-table green" style="background-color: whitesmoke">
                                    <div class="pricing-head">
                                        <h1>
                                            <strong><?php echo($i + 1) ?></strong>
                                        </h1>
                                    </div>
                                    <div class="price-actions">
                                        <form class="no-padding no-margin" action="">
                                            <input type="button" id="forget-btn" class="btn btn-mini btn-block login-btn" value="Saji"/>
                                        </form>
                                    </div>
                                    <ul>
                                        <li>
                                            <strong>1</strong>
                                            Website
                                        </li>
                                        <li>
                                            <strong>2</strong>
                                            Projects
                                        </li>
                                        <li>
                                            <strong>1GB</strong>
                                            Storage
                                        </li>
                                        <li>
                                            <strong>$0</strong>
                                            Google Adwords Credit
                                        </li>
                                        <li>
                                            <strong>1GB</strong>
                                            Storage
                                        </li>
                                        <li>
                                            <strong>$0</strong>
                                            Google Adwords Credit
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="request-container">
                <table id="request-list" class="table">
                    <thead>
                    <tr>
                        <th>Pesanan</th>
                        <th>Qty</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pusher.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
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

            var s_request = 'table#request-list';
            var products  = <?php echo json_encode(isset($products) ? $products : [])?>;
            var queues    = {};
            var request   = {};

            function updateSelectedItem(iID)
            {
                $.post(
                    $('meta[name=base-url]').attr('content') + 'api/dapur/item/update',
                    {id: iID},
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
                            if ((response['s'] !== undefined) && (parseInt(response['s']) === 1))
                            {
                                dummyLoad();
                            }
                        }
                    })
                    .fail(function (error) {
                    })
                    .always(function (error) {
                    });
            }

            $(s_request).on('click', 'button.p-dcs', function () {
                var _selectedItem = $(this).parents('tr').data('id');
                $.each(queues, function (qId, qv) {
                    if ((qv['pesanan'][_selectedItem] !== undefined) && (qv['pesanan'][_selectedItem]['diproses'] < qv['pesanan'][_selectedItem]['jumlah']))
                    {
                        updateSelectedItem(qv['pesanan'][_selectedItem]['id_td']);
                        return false;
                    }
                });
            });

            function viewRequest()
            {
                var s_request_body = $(s_request).find('tbody');
                s_request_body.find('tr').remove();
                $.each(request, function (rk, rv) {
                    s_request_body.append(''
                        //@formatter:off
                        +'<tr data-id="'+rk+'">'
                        +    '<td class="p-name">'+ products['p_' + rv['id_produk']]['nama_produk'] +'</td>'
                        +    '<td class="p-qty">'+ rv['qty'] +'</td>'
                        +    '<td>'
                        +        '<button class="btn p-dcs">'
                        +            '<i class="icon-minus icon-black"></i>'
                        +        '</button>'
                        +    '</td>'
                        +'</tr>'
                        //@formatter:on
                    )
                });
            }

            function update()
            {
                request = {};
                $.each(queues, function (qk, qv) {
                    $.each(qv['pesanan'], function (pk, pv) {
                        var ___req = request['r_' + pv['id_produk']];
                        if (___req === undefined)
                        {
                            ___req = {
                                id_produk: pv['id_produk'],
                                qty: (pv['jumlah'] - pv['diproses'])
                            }
                        }
                        else
                        {
                            ___req['qty'] += (pv['jumlah'] - pv['diproses']);
                        }
                        request['r_' + pv['id_produk']] = ___req;
                    })
                });
                viewRequest();
            }

            $('button#dummy-load').on('click', function () {
                dummyLoad();
            });

            function dummyLoad()
            {
                $.post(
                    $('meta[name=base-url]').attr('content') + 'api/dapur/load',
                    null,
                    null,
                    'json')
                    .done(function (response) {
                        if (response !== undefined)
                        {
                            if (response['n'] !== undefined)
                            {
                                for (var i = -1, is = response['n'].length; ++i < is;)
                                {
                                    /*$.notify({
                                        message: response['n'][i]
                                    }, {
                                        type: 'info'
                                    });*/
                                }
                            }
                            if ((response['r'] !== undefined) && (response['r']['pesanan'] !== undefined))
                            {
                                queues = response['r']['pesanan'];
                                update();
                            }
                        }
                    })
                    .fail(function (error) {
                    })
                    .always(function (error) {
                    });
            }

// Enable pusher logging - don't include this in production
            /*Pusher.logToConsole = true;

            var pusher = new Pusher('7dd372a2fbe222be06f6', {
                cluster: 'ap1',
                encrypted: true
            });

            var channel = pusher.subscribe('queue');
            channel.bind('created', function (data) {
                console.log(data)
            });*/
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

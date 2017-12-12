<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url() ?>assets/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body id="login">
<div class="container">

    <form class="form-signin" method="post" action="<?php echo base_url('index.php/login/auth') ?>">
        <h2 class="form-signin-heading">Login</h2>

        <input type="text" class="input-block-level" placeholder="Username" id="username" name="username">
        <input type="password" class="input-block-level" placeholder="Password" id="password" name="password">
        <button class="btn btn-large btn-primary" type="submit">Login</button>

    </form>

</div> <!-- /container -->
<script src="<?php echo base_url() ?>assets/vendors/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

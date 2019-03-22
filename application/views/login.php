<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MaterialAdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- Material Design -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/bootstrap-material-design.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/ripples.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/MaterialAdminLTE.min.css') ?>">
  
  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/fonts-googleapis.css') ?>">
  

</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?php echo site_url(); ?>">Material<b>Admin</b>LTE</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo base_url('assets/dist/img/user_login.png') ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="<?php echo site_url('login/log_in') ?>" class="lockscreen-credentials" id="form_login">
      <div class="input-group">
      <input type="text" name="username" class="form-control" placeholder="username">
      <input type="password" name="password" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      
    </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="login.html">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2018 <a href="http://almsaeedstudio.com"><b>Almsaeed Studio</b></a>, <br> 
	<a href="https://fezvrasta.github.io"><b>Federico Zivolo</b></a> and <a href="https://ducthanhnguyen.github.io"><b>Thanh Nguyen</b></a>. All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Material Design -->
<script src="<?php echo base_url('assets/dist/js/material.min.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/js/ripples.min.js') ?>"></script>
<script>
    $.material.init();
    $(document).ready(function(e){
        $('input[name="username"]').focus();
    });
    $(document).keypress(function(e){
        if(e.keycode == 13 || e.which == 13){
            document.forms[0].submit(); //submit the form
            return false; 
        }
    });
    $(document).click(function() {
        $('input[name="username"]').focus();
    });
    $("#form_login").click(function(event) {
        event.stopPropagation();
    });
</script>
</body>
</html>

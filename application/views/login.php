<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>index.html"><img class="logo-img" src="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <?php if($this->session->flashdata('alert_msg')) { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('alert_msg'); ?>
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </a>
                </div>
                <?php } ?>
                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="login_id" name="login_id" type="text" placeholder="Mobile Number" autocomplete="off">
                        <?php echo form_error('login_id');?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                        <?php echo form_error('password');?>
                    </div>
                    
                    <button type="submit" name="save_n_login_user" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url('assets/admi32n_ma4nager_con45trol_panel/');?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>
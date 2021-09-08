<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url;?>asset/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/slicknav.min.css">
    <!-- amchart css -->
    <!--link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /-->
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo base_url;?>asset/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
            <form id="frmlogin" action="">
                <div class="login-form-head">
                    <h4>Bienvenido</h4>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name = "usuario">
                        <i class="ti-user"></i><i class="fas fa-user-tie"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name = "password">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
                        
                    </div>
                    <div class="submit-btn-area">
                        <button type="submit" onclick="frmlogin(event)"> Submit <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="<?php echo base_url;?>asset/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url;?>asset/js/popper.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="<?php echo base_url;?>asset/js/plugins.js"></script>
    <script>
        const base_url = "<?php echo base_url;?>";
    </script>
    <script src="<?php echo base_url;?>Assets/js/login.js"></script>
    <script src="<?php echo base_url;?>asset/js/scripts.js"></script>
</body>

</html>
<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
   
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url;?>Assets/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url;?>Assets/DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url;?>Assets/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url;?>Assets/css/responsive.jqueryui.min.css">
    <!-- style css --><link rel="stylesheet" href="<?php echo base_url;?>asset/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url;?>asset/css/responsive.css">
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <!--link href="<?php echo base_url; ?>Assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /-->
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    
    <link href="<?php echo base_url;?>Assets/css/select2.min.css" rel="stylesheet" />
    <!-- modernizr css -->
    <script src="<?php echo base_url;?>asset/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fas fa-cogs"></i>
                                    <span>Configuración</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url;?>Usuarios">Usuarios</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url;?>Clientes"><i class="fas fa-users"></i> <span>Clientes</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fas fa-solid fa-cart-arrow-down"></i>
                                    <span>Productos</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url;?>Productos">Productos</a></li>
                                    <li><a href="<?php echo base_url;?>Categorias">Categoria</a></li>
                                    <li><a href="<?php echo base_url;?>Marcas">Marcas</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url;?>Proveedores"><i class="fas fa-dolly"></i><span>Proveedores</span></a></li>
                            <!--li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fas fa-solid fa-cart-arrow-down"></i>
                                    <span>compra</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url;?>Compras">Nueva compra</a></li>
                                    <li><a href="<?php echo base_url;?>Compras/historialCompras">Historial de compra</a></li>
                                </ul>
                            </li-->
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fas fa-solid fa-cart-arrow-down"></i>
                                    <span>Ventas</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url;?>Ventas">Nueva venta</a></li>
                                    <li><a href="<?php echo base_url;?>Ventas/historialVentas">Historial de ventas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <div class="col-md-6 col-sm-8 clearfix">
                                <div class="nav-btn pull-left">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarCotrasena">Cambiar Contraseña</a>
                                <a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">cerrar sesion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        <!-- main content area start 
        <div class="main-content">
            page title area start 
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarCotrasena">Cambiar Contraseña</a>
                                <a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">cerrar sesion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

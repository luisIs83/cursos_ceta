<?php 
    $user_session = session();
 ?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/js/all.js"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-info bg-info">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Contro de Acceso</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $user_session->nombre, $user_session->id_usuario ?><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/logout">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo base_url(); ?>/usuarios">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Inicio
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Módulos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>  
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                
                               <!--  <a class="nav-link" href="<?php echo base_url(); ?>/categorias">Categorias</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/carreras">Carreras</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/generos">Géneros</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/dependencias">Dependencias</a> -->
                                <a class="nav-link" href="<?php echo base_url(); ?>/cursos">Cursos</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/prof_cursos"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> Profesores CETA</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?php echo base_url(); ?>/usuarios">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Registro usuarios
                        </a>
                        <a class="nav-link" href="<?php echo base_url(); ?>/reportes">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reporte de inscritos
                        </a>
                    </div>
                </div>
            </nav>
        </div>
<?php 
    $user_session = session();
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de Control - SB Admin</title>
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/js/all.js"></script>
    <style>
            body {
            background-image: url('<?php echo base_url(); ?>/assets/img/imaEntradaCETA.jpg');
            background-size: cover; /* Ajusta la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
            margin: 0; /* Elimina el margen por defecto */
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-info bg-info">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url(); ?>/usuarios">Control de Acceso</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $user_session->nombre; ?>
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!--li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li-->
                    <li><hr class="dropdown-divider" /></li>
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
                        <!-- Menú común para todos los usuarios 
                        <a class="nav-link" href="<?php echo base_url(); ?>/usuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>-->

                        <!-- Menú específico por rol -->
                        <?php if($user_session->c_rol == 1): // Administrador ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Principal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdmin" aria-labelledby="headingAdmin" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url(); ?>/principal">Principal</a>
                                    <a class="nav-link" href="<?php echo base_url(); ?>/cursos">Gestión de Cursos</a>
                                    <a class="nav-link" href="<?php echo base_url(); ?>/reportes">Reporte de Inscritos</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?php echo base_url(); ?>/relacion/espera">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Lista de Espera
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/usuarios/logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Cerrar sesión
                            </a>
                        <?php endif; ?>

                        <?php if($user_session->c_rol == 2): // Profesor ?>
                            <a class="nav-link" href="<?php echo base_url(); ?>/prof_cursos">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Mis Cursos
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/relacion/espera">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Lista de Espera
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/reportes">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reporte de Inscritos
                            </a>
                        <?php endif; ?>

                        <?php if($user_session->c_rol == 3): // Usuario ?>
                            <!--a class="nav-link" href="<?php echo base_url(); ?>/">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Mis Cursos
                            </a-->
                            <a class="nav-link" href="<?php echo base_url(); ?>/relacion">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Inscribir Curso
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/relacion/espera">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Lista de Espera
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>/usuarios/logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Salir
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </nav>
        </div>

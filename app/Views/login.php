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
        <title>Inicio de sesión</title>
        <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>/css/all.min.css" rel="stylesheet" />
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
        <style>
    .click-icon {
        font-size: 2rem; /* Tamaño del ícono */
        color: #007bff; /* Color del ícono */
        cursor: pointer;
        position: relative;
        animation: click-animation 1s infinite; /* Duración de la animación y repetición */
    }

    /* Animación para simular clic */
    @keyframes click-animation {
        0%, 100% {
            transform: scale(1);
            top: 0;
        }
        50% {
            transform: scale(0.9);
            top: 3px;
        }
    }
</style>
    </head>
    <body> 
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><H4 class="text-center font-weight-light my-4">Para iniciar sesión y generar su contraseña primero llene su registro. <a href="<?php echo base_url(); ?>/usuarios/nuevo">CLIC <i class="fas fa-hand-pointer click-icon"></i> AQUÍ </a></H4></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url(); ?>/usuarios/valida">
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-3" id="usuario" name="usuario" type="text" placeholder="Usuario" maxlength="10" />               
                                                <label class="small mb-2" for="usuario">Usuario (RFC sin Homoclave)</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="password" />
                                                <label class="small mb-2" for="password">Contraseña</label>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <button class="btn btn-primary" type="submit">Entrar</button>
                                            </div>
                                            <?php if(isset($validation)){ ?>
                                                <div class="alert alert-danger">
                                                    <?php echo $validation->listErrors(); ?>
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($error)){ ?>
                                                <div class="alert alert-danger">
                                                    <?php echo $error; ?>
                                                </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Centro de Tecnologías para el Aprendizaje <?php echo date('Y'); ?></div>
                            <div>
                                <a href="<?php echo base_url(); ?>/assets/docs/AvisoPrivacidad20241104.pdf/" target="_blank">Aviso de privacidad</a>
                                &middot;
                                <!--a href="#">Terms &amp; Conditions</a-->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js" ></script>
        <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js" ></script>
        <script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>
        <script src="<?php echo base_url(); ?>/jquery/jquery.min"></script>
        <script src="<?php echo base_url(); ?>/assets/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js"></script>
    </body>
</html>

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
        <script src="<?php echo base_url(); ?>/js/all.js"></script>
    </head>
    <body class="bg-primary"> 
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar sesión</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url(); ?>/usuarios/valida">
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-3" id="usuario" name="usuario" type="text" placeholder="Usuario" />               
                                                <label class="small mb-2" for="usuario">Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="password" />
                                                <label for="password">Contraseña</label>
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
                                        <div class="small"><a href="register.html">¿No tienes cuenta? Registrate aquí!</a></div>
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
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
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

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
    <body class="bg-primary" > 
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">                        
                        <div class="row justify-content-evenly">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" >
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Hola <?php echo $user_session->nombre, $user_session->id_usuario ?></h3></div>
                                    <div class="card-body">                                  
                                        	<div class="d-grid gap-2 col-6 mx-auto">
  												<a href="" class="btn btn-primary">Mis cursos</a>
  												<a href="" class="btn btn-primary">Registrar curso</a>
											</div>                                                                            
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?php echo base_url(); ?>/usuarios/nuevo"></a></div>
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
        <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js" ></script>
        <script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>
        <script src="<?php echo base_url(); ?>/jquery/jquery.min"></script>
        <script src="<?php echo base_url(); ?>/assets/demo/datatables-demo.js"></script>       
    </body>
</html>

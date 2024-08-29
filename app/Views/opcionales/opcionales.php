<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registro</title>
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/js/all.js"></script>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">

                            <form action="<?php echo base_url(); ?>/opcionales/insertar " method="POST" autocomplete="off">

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Opcionales</h3>
                                    </div>
                                    <div class="card-body">
                                        ¿Cuál es la importancia que para usted tienen en este momento las herramientas digitales en su práctica docente?
                                    <div class="form-floating mb-3">
                                            <input class="form-control" id="nombre" type="text" name="op_uno" placeholder="" autofocus required />
                                            <label for="nombre"></label>
                                        </div>
                                        ¿Tiene planeado integrar en forma permanente a su práctica docente presencial, herramientas digitales para facilitar la enseñanza y el aprendizaje y por qué?
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nombre" type="text" name="op_dos" placeholder="" autofocus required />
                                            <label for="nombre"></label>
                                        </div>
                                        ¿Le interesaría compartir en un futuro próximo con la comunidad de la FES Zaragoza, su experiencia con el empleo de herramientas digitales aplicadas a la enseñanza para el aprendizaje?
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="ap_paterno" type="text" name="op_tres" placeholder="" required />
                                            <label for="inputFirstName"></label>
                                        </div>
                                        Comentarios y sugerencias.
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="ap_materno" type="text" name="op_cuatro" placeholder="" />
                                            <label for="inputEmail"></label>
                                        </div>
                                    </div>
                                </div>
                                                              
                                <br>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </form>


                        </div>

                    </div>

                </div>
            </main>
        </div>

    </div>

    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; CETA <?php echo date('Y'); ?></div>
                    <div>
                        <a href="https://www.facebook.com/CETAFESZARAGOZA/" target="_blank"> Facebook <i class="fa-brands fa-facebook-square"></i></a>
                        &middot;
                        <a href="https://ceta.zaragoza.unam.mx/" target="_blank">Sitio Web</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/scripts.js"></script>

</body>

</html>


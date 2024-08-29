<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registro</title>
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
                        <div class="col-lg-7">
                            <form action="<?php echo base_url(); ?>/usuarios/insertar" method="POST" autocomplete="off">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <img src="<?php echo base_url(); ?>/assets/img/cursos_24.jpg/" width="100%" height="120">
                                    </div>
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Datos del usuario</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputEmail">Número de trabajador o RFC</label>
                                            <input class="form-control" id="usuario" type="text" name="usuario" style="" placeholder="nombre" disabled value="<?php echo $numero?>"/>  
                                            <input hidden class="form-control" id="usuario" type="text" name="usuario" placeholder="nombre" value="<?php echo $numero?>" />     </div><br>
                                        <div class="form-group">
                                            <label for="email"><h7>Ingrese un correo válido<h7></label>
                                            <input class="form-control" id="email" type="email" name="email" placeholder="email" autofocus  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label class="small mb-1" for="nombre"><h7>Favor de usar mayúsculas y minúsculas</h7></label>
                                            <input class="form-control" id="nombre" type="text" name="nombre" style="" placeholder="Nombre"  />
                                            
                                        </div><br>
                                        
                                        <div class="form-group">
                                            <label for="inputFirstName"><h7>Favor de usar mayúsculas y minúsculas</h7></label>
                                            <input class="form-control" id="ap_paterno" type="text" name="ap_paterno" style="" placeholder="Apellido paterno"  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="inputEmail"><h7>Favor de usar mayúsculas y minúsculas</h7></label>
                                            <input class="form-control" id="ap_materno" type="text" name="ap_materno" style=""placeholder="Apellido materno"  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="inputEmail"><h7>Teléfono celular<h7></label>
                                            <input class="form-control" id="num_celular" type="numero" name="num_celular" placeholder="Número celular" maxlength="50"  />
                                            
                                        </div>
                                        <!--<div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password" value="<?php //echo set_value('password') ?>" />
                                            <label for="inputEmail">Contraseña</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="repassword" type="password" name="repassword" value="<?php //echo set_value('repassword') ?>" />
                                            <label for="inputEmail">Repite contraseña</label>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Género</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="genero" name="cat_genero" class="form-select" aria-label="Default select example" >
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($generos as $genero) { ?>
                                                <option  value="<?php echo $genero['id_gen']; ?>"><?php echo $genero['nom_genero']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Es usted</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="genero" name="cat_categoria" class="form-select" aria-label="Default select example">
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($categorias as $categoria) { ?>
                                                <option value="<?php echo $categoria['id_cat']; ?>"><?php echo $categoria['nom_cat']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Carrera o área de adscripción</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="genero" name="cat_carrera" class="form-select" aria-label="Default select example">
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($carreras as $carrera) { ?>
                                                <option value="<?php echo $carrera['id_carrera']; ?>"><?php echo $carrera['nom_carrera']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Dependencia a la que pertenece</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="genero" name="cat_dependencia" class="form-select" aria-label="Default select example">
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($dependencias as $dependencia) { ?>
                                                <option value="<?php echo $dependencia['id_dep']; ?>"><?php echo $dependencia['nom_dep']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Curso al que se inscribe</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="genero" name="nombre_curso" class="form-select" aria-label="Default select example">
                                            <option value="0">Seleccione:</option>
                                            <?php sort($cursos);  foreach($cursos as $curso) { ?>
                                                <option value="<?php echo $curso['id_cursos']; ?>"><?php echo $curso['nom_curso']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Opcionales</h3>
                                    </div>
                                    <div class="card-body">
                                        ¿Cuál es la importancia que para usted tienen en este momento las herramientas digitales en su práctica docente?
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nombre" type="text" name="op_uno" placeholder="" maxlength="490"/>
                                            <label for="nombre"></label>
                                        </div>
                                        ¿Tiene planeado integrar en forma permanente a su práctica docente presencial, herramientas digitales para facilitar la enseñanza y el aprendizaje y por qué?
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nombre" type="text" name="op_dos" placeholder="" maxlength="490"/>
                                            <label for="nombre"></label>
                                        </div>
                                        ¿Le interesaría compartir en un futuro próximo con la comunidad de la FES Zaragoza, su experiencia con el empleo de herramientas digitales aplicadas a la enseñanza para el aprendizaje?
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="ap_paterno" type="text" name="op_tres" placeholder="" maxlength="490"/>
                                            <label for="inputFirstName"></label>
                                        </div>
                                        Comentarios y sugerencias.
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="ap_materno" type="text" name="op_cuatro" placeholder="" maxlength="490"/>
                                            <label for="inputEmail"></label>
                                        </div>
                                    </div>
                                </div>                            

                                <br>
                                <button type="submit" class="btn btn-success">Guardar</button>
                               <a href="<?php echo base_url(); ?>/usuarios/login" class="btn btn-warning">Regresar</a>
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
        <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js" ></script>
        <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js" ></script>
        <script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>
        <script src="<?php echo base_url(); ?>/jquery/jquery.min"></script>

</body>
</html>


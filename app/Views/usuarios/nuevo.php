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
                                            <label for="usuario"><h6>Ingrese RFC SIN HOMOCLAVE como el siguiente ejemplo: </h6></label>
                                            <input class="form-control" id="usuario" type="text" name="usuario" placeholder="Ejemplo: TOGM900603" pattern="[A-Z]{4}[0-9]{6}" title="El RFC debe contener 4 letras MAYÚSCULAS seguidas de 6 números, sin HOMOCLAVE" maxlength="10" required autofocus  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="email"><h6>Ingrese un correo válido:</h6></label>
                                            <input class="form-control" id="email" type="email" name="email" placeholder="ejemplo@gmail.com" />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="nombre"><h6>Nombre(s). Favor de usar mayúsculas y minúsculas y acento, si es el caso:</h6></label>
                                            <input class="form-control" id="nombre" type="text" name="nombre" style="" placeholder="Sebastian"  />
                                            
                                        </div><br>
                                        
                                        <div class="form-group">
                                            <label for="ap_paterno"><h6>Apellido paterno. Favor de usar mayúsculas y minúsculas y acento, si es el caso:</h6></label>
                                            <input class="form-control" id="ap_paterno" type="text" name="ap_paterno" style="" placeholder="Sánchez"  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="ap_materno"><h6>Apellido materno. Favor de usar mayúsculas y minúsculas y acento, si es el caso:</h6></label>
                                            <input class="form-control" id="ap_materno" type="text" name="ap_materno" style=""placeholder="Rodríguez"  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="num_celular"><h6>Teléfono celular:</h6></label>
                                            <input class="form-control" id="num_celular" type="tel" name="num_celular" placeholder="5500112244" maxlength="50"  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="password"><h6>Contraseña:</h6></label>
                                            <input class="form-control" id="password" type="password" name="password" value="<?php echo set_value('password') ?>" />
                                        </div><br>
                                        <div class="form-group">
                                            <label for="repassword"><h6>Repite contraseña:</h6></label>
                                            <input class="form-control" id="repassword" type="password" name="repassword" value="<?php echo set_value('repassword') ?>" />
                                        </div>
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
                                            <?php sort($categorias); foreach($categorias as $categoria) { ?>
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

                                <br>
                                <button type="button" class="btn btn-success" id="guardarBtn">Guardar</button>
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

<script>
document.getElementById('guardarBtn').addEventListener('click', function(event) {
    // Obtiene el valor del RFC, correo y nombre
    const rfcInput = document.getElementById('usuario').value;
    const emailInput = document.getElementById('email').value;
    const nombreInput = document.getElementById('nombre').value;
    
    // Patrón de validación para RFC: 4 letras mayúsculas + 6 números
    const rfcPattern = /^[A-Z]{4}[0-9]{6}$/;
    
    // Patrón de validación para el correo
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    
    // Patrón de validación para el nombre
    const nombrePattern = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ']+\s?)+$/;
    
    let isValid = true;
    
    // Validación del RFC
    if (!rfcPattern.test(rfcInput)) {
        isValid = false;
        // Muestra el modal para el RFC
        const rfcModal = new bootstrap.Modal(document.getElementById('rfcModal'));
        rfcModal.show();
    }
    
    // Validación del correo electrónico
    if (!emailPattern.test(emailInput)) {
        isValid = false;
        // Muestra el modal para el correo electrónico
        const emailModal = new bootstrap.Modal(document.getElementById('emailModal'));
        emailModal.show();
    }

    // Validación del nombre
    if (!nombrePattern.test(nombreInput)) {
        isValid = false;
        // Muestra el modal para el nombre
        const nombreModal = new bootstrap.Modal(document.getElementById('nombreModal'));
        nombreModal.show();
    }

    // Si todas las validaciones son correctas, se envía el formulario
    if (isValid) {
        document.querySelector('form').submit();
    }
});
</script>


<!-- Modal -->
<div class="modal fade" id="rfcModal" tabindex="-1" aria-labelledby="rfcModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rfcModalLabel">Error en el RFC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Por favor, ingrese el RFC correctamente siguiendo estas reglas:</p>
                <ul>
                    <li>Debe contener exactamente <strong>10 caracteres</strong>.</li>
                    <li>Los primeros <strong>cuatro</strong> caracteres deben ser <strong>letras mayúsculas</strong>.</li>
                    <li>Los siguientes <strong>seis</strong> caracteres deben ser <strong>números</strong>.</li>
                    <li>No incluya la homoclave (los tres últimos caracteres del RFC).</li>
                    <li>Ejemplo válido: <strong>TOGM900603</strong></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para correo -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Error en el correo electrónico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Por favor, ingrese un correo electrónico válido en el formato correcto:</p>
                <ul>
                    <li>El correo debe estar en el formato: <strong>nombre@dominio.com</strong>.</li>
                    <li>Ejemplo de correo válido: <strong>ejemplo@gmail.com</strong></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para nombre -->
<div class="modal fade" id="nombreModal" tabindex="-1" aria-labelledby="nombreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nombreModalLabel">Error en el nombre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Por favor, ingrese un nombre válido siguiendo estas reglas:</p>
                <ul>
                    <li>El nombre debe comenzar con una <strong>letra mayúscula</strong>.</li>
                    <li>Se permiten nombres con más de una palabra (nombres compuestos).</li>
                    <li>Ejemplo válido: <strong>Juan Carlos</strong>, <strong>María Fernanda</strong></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>





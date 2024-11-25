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
    <style>
            body {
            background-image: url('<?php echo base_url(); ?>/assets/img/imaEntradaCETA.jpg');
            background-size: cover; /* Ajusta la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Mantiene la imagen fija al hacer scroll */
            height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
            margin: 0; /* Elimina el margen por defecto */
        }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <?php if(isset($validation)){ ?>
                                <div class="alert alert-danger"> 
                                    <?php echo $validation->listErrors(); ?>
                                </div>        
                            <?php } ?>
                            <?php 
                                // Supongamos que $categorias1, $categorias2 y $categorias3 están definidos y contienen las categorías para cada select.
                                usort($categorias, function($a, $b) {
                                    return strcmp($a['nom_cat'], $b['nom_cat']);
                                });

                                usort($carreras, function($a, $b) {
                                    return strcmp($a['nom_carrera'], $b['nom_carrera']);
                                });

                                usort($dependencias, function($a, $b) {
                                    return strcmp($a['nom_dep'], $b['nom_dep']);
                                });
                            ?>
                            <form id="userForm" action="<?php echo base_url(); ?>/usuarios/insertar" method="POST" autocomplete="off">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <img src="<?php echo base_url(); ?>/assets/img/cursos_25.jpg/" width="100%" height="120">
                                    </div>
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Datos del usuario</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="usuario"><h6>Ingrese RFC SIN HOMOCLAVE como el siguiente ejemplo: </h6></label>
                                            <input class="form-control" id="usuario" type="text" name="usuario" placeholder="TOGM900603" value="<?= old('usuario'); ?>" pattern="[A-Z]{4}[0-9]{6}" title="El RFC debe contener 4 letras MAYÚSCULAS seguidas de 6 números, sin HOMOCLAVE" maxlength="10" required autofocus  />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="email"><h6>Ingrese un correo válido:</h6></label>
                                            <input class="form-control" id="email" type="text" name="email" placeholder="ejemplo@zaragoza.unam.mx" value="<?= old('email'); ?>"/>
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="nombre"><h6>Nombre(s). Favor de usar mayúsculas y minúsculas y acento, si es el caso:</h6></label>
                                            <input class="form-control" id="nombre" type="text" name="nombre" style="" placeholder="Sebastian" value="<?= old('nombre'); ?>" />
                                            
                                        </div><br>
                                        
                                        <div class="form-group">
                                            <label for="ap_paterno"><h6>Apellido paterno. Favor de usar mayúsculas y minúsculas y acento, si es el caso:</h6></label>
                                            <input class="form-control" id="ap_paterno" type="text" name="ap_paterno" style="" placeholder="Sánchez" value="<?= old('ap_paterno'); ?>" />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="ap_materno"><h6>Apellido materno. Favor de usar mayúsculas y minúsculas y acento, si es el caso:</h6></label>
                                            <input class="form-control" id="ap_materno" type="text" name="ap_materno" style=""placeholder="Rodríguez" value="<?= old('ap_materno'); ?>" />
                                            
                                        </div><br>
                                        <div class="form-group">
                                            <label for="num_celular"><h6>Teléfono celular:</h6></label>
                                            <input class="form-control" id="num_celular" type="text" name="num_celular" placeholder="5500112244" maxlength="10" value="<?= old('num_celular'); ?>" />
                                        </div>  <br>  
                                        <div class="form-group">
                                            <label for="password"><h6>Contraseña:  </h6></label>
                                            <small id="passwordHelp" class="form-text text-muted">
                                                        La contraseña debe tener al menos 8 caracteres, incluyendo mayúsculas, minúsculas, números y un carácter especial.
                                                    </small>
                                                <div class="input-group">
                                                    <input class="form-control" id="password" type="password" name="password" value="<?php echo set_value('password') ?>" />
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                                <i class="fas fa-eye" id="eyeIcon"></i>
                                                            </button>
                                                        </div>
                                                </div>
                                            </div><br>

                                        <div class="form-group">
                                         <label for="repassword"><h6>Confirmar Contraseña:</h6></label>
                                         <div class="input-group">
                                             <input class="form-control" id="repassword" type="password" name="repassword" value="<?php echo set_value('repassword') ?>" />
                                             <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="toggleRePassword">
                                                        <i class="fas fa-eye" id="eyeIconRe"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> <br>                                      
                                    </div>
                                </div>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Género</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="selectGenero" name="cat_genero" class="form-select" aria-label="Default select example" required >
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($generos as $genero) { ?>
                                                <option value="<?php echo $genero['id_gen']; ?>" 
                                                    <?php echo (old('cat_genero') == $genero['id_gen']) ? 'selected' : ''; ?>>
                                                    <?php echo $genero['nom_genero']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Es usted</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="selectCategoria" name="cat_categoria" class="form-select" aria-label="Default select example" onchange="toggleOtherField(this)" required>
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($categorias as $categoria) { ?>
                                                <option value="<?php echo $categoria['id_cat']; ?>"
                                                    <?php echo (old('cat_categoria') == $categoria['id_cat']) ? 'selected' : ''; ?>>
                                                    <?php echo $categoria['nom_cat']; ?>
                                                </option>
                                            <?php } ?>
                                            <!--option value="otra">Otra no especificada</option-->
                                        </select>
                                        <!--div id="otraCategoriaDiv" style="display: none; margin-top: 10px;">
                                            <label for="otra_categoria"><H6>Especifique su categoría:</H6></label>
                                            <input type="text" id="otra_categoria" name="otra_categoria" class="form-control" value="<?php echo old('otra_categoria'); ?>" placeholder="Especifique aquí" required>
                                        </div-->
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Carrera o área de adscripción</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="selectCarrera" name="cat_carrera" class="form-select" aria-label="Default select example" onchange="toggleOtherField(this)" required>
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($carreras as $carrera) { ?>
                                                <option value="<?php echo $carrera['id_carrera']; ?>"
                                                    <?php echo (old('cat_carrera') == $carrera['id_carrera']) ? 'selected' : ''; ?>>
                                                    <?php echo $carrera['nom_carrera']; ?>
                                                </option>
                                            <?php } ?>
                                            <!--option value="otra">Otra no especificada</option-->
                                        </select>
                                        <!--div id="otraCarreraDiv" style="display: none; margin-top: 10px;">
                                            <label for="otra_carrera"><H6>Especifique su carrera:</H6></label>
                                            <input type="text" id="otra_carrera" name="otra_carrera" class="form-control" value="<?php echo old('otra_carrera'); ?>" placeholder="Especifique aquí" required>
                                        </div-->
                                    </div>
                                </div>

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-left font-weight-light my-1">Dependencia a la que pertenece</h3>
                                    </div>
                                    <div class="card-body">
                                        <select id="selectDependencia" name="cat_dependencia" class="form-select" aria-label="Default select example" onchange="toggleOtherField(this)" required>
                                            <option value="0">Seleccione:</option>
                                            <?php foreach($dependencias as $dependencia) { ?>
                                                <option value="<?php echo $dependencia['id_dep']; ?>"
                                                    <?php echo (old('cat_dependencia') == $dependencia['id_dep']) ? 'selected' : ''; ?>>
                                                    <?php echo $dependencia['nom_dep']; ?>
                                                </option>
                                            <?php } ?>
                                            <!--option value="otra">Otra no especificada</option-->
                                        </select>
                                        <!--div id="otraDependenciaDiv" style="display: none; margin-top: 10px;">
                                            <label for="otra_dependencia"><H6>Especifique su categoría:</H6></label>
                                            <input type="text" id="otra_dependencia" name="otra_dependencia" class="form-control" value="<?php echo old('otra_dependencia'); ?>" placeholder="Especifique aquí" required>
                                        </div-->
                                    </div> 
                                </div> 
                                <br>
                                <div class="text-center mt-3">
                                <button type="button" class="btn btn-success" id="guardarBtn">Guardar</button>
                               <a href="<?php echo base_url(); ?>/usuarios/login" class="btn btn-warning">Regresar</a>
                               </div>
                            </form>


                        </div>

                    </div>

                </div>
            </main>
        </div>

    </div><br><br><br><br>

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

    <!-- Modal para mostrar los errores -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Errores de Validación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="errorContent"></p> <!-- Aquí se mostrarán los errores -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal1" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí se muestra el mensaje de error -->
                <?= session()->getFlashdata('errorss') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Registro Exitoso</h5>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="successContent">
                Registro exitoso. Favor de revisar el correo que registró.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="confirmCloseModal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
        <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js" ></script>
        <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js" ></script>
        <script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script> 
        <script src="<?php echo base_url(); ?>/js/popper.min.js"></script> 

        <script>
    document.getElementById('confirmCloseModal').addEventListener('click', function() {
        // Redirigir a usuarios/login
        window.location.href = 'usuarios/login';
    });

    // Si usas el botón de cerrar en el header del modal
    document.querySelector('.btn-close').addEventListener('click', function() {
        window.location.href = 'usuarios/login';
    });
</script>

<script>
    document.getElementById('guardarBtn').addEventListener('click', function(event) {
        event.preventDefault();  // Evitar el envío del formulario hasta validar

        // Obtiene los valores de los campos
        const rfcInput = document.getElementById('usuario').value;
        const emailInput = document.getElementById('email').value;
        const nombreInput = document.getElementById('nombre').value;
        const ap_paternoInput = document.getElementById('ap_paterno').value;
        const ap_maternoInput = document.getElementById('ap_materno').value;
        const num_celularInput = document.getElementById('num_celular').value;
        const passwordInput = document.getElementById('password').value;
        const repasswordInput = document.getElementById('repassword').value;

        // Obtiene los valores de los selects
        const generoInput = document.getElementById('selectGenero').value;
        const categoriaInput = document.getElementById('selectCategoria').value;
        const carreraInput = document.getElementById('selectCarrera').value;
        const dependenciaInput = document.getElementById('selectDependencia').value;

        // Expresiones regulares para las validaciones
        const rfcPattern = /^[A-Z]{4}[0-9]{6}$/;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        const nombrePattern = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ']+\s?)+$/;
        const apPattern = /^([A-ZÁÉÍÓÚÑ][a-záéíóúñ']+\s?)+$/;
        const num_celularPattern = /^[0-9]{10}$/;

        // Validación para el password (mínimo 8 caracteres, mayúscula, minúscula, número y carácter especial)
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

        // Inicializar un array para almacenar mensajes de error
        let errors = [];

         //Validaciones
        if (!rfcPattern.test(rfcInput)) {
            errors.push("<strong>El RFC </strong>debe tener 4 letras mayúsculas y 6 números.");
        }
        if (!emailPattern.test(emailInput)) {
            errors.push("<strong>El correo electrónico</strong> no tiene un formato válido.");
        }
        if (!nombrePattern.test(nombreInput)) {
            errors.push("<strong>El nombre</strong> debe comenzar con una mayúscula y solo puede contener letras.");
        }
        if (!apPattern.test(ap_paternoInput)) {
            errors.push("<strong>El apellido paterno</strong> debe comenzar con una mayúscula y solo puede contener letras.");
        }
        if (!apPattern.test(ap_maternoInput)) {
            errors.push("<strong>El apellido materno</strong> debe comenzar con una mayúscula y solo puede contener letras.");
        }
        if (!num_celularPattern.test(num_celularInput)) {
            errors.push("<strong>El número de celular</strong> debe contener 10 dígitos.");
        }
        
        // Validación del password
        if (!passwordPattern.test(passwordInput)) {
            errors.push("<strong>La contraseña</strong> debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial.");
        }

        // Validación de repassword
        if (passwordInput !== repasswordInput) {
            errors.push("Las contraseñas no coinciden.");
        }        

        // Validación de selects
        if (generoInput === "0") {
            errors.push("<strong>Género</strong> es un campo obligatorio. Debe seleccionar una opción.");
        }
        if (categoriaInput === "0") {
            errors.push("<strong>Categoría</strong> es un campo obligatorio. Debe seleccionar una opción.");
        }
        if (carreraInput === "0") {
            errors.push("<strong>Carrera</strong> es un campo obligatorio. Debe seleccionar una opción.");
        }
        if (dependenciaInput === "0") {
            errors.push("<strong>Dependencia</strong> es un campo obligatorio. Debe seleccionar una opción.");
        }

        // Si hay errores, mostrarlos
        if (errors.length > 0) {
        // Muestra los errores en el modal
        const errorList = errors.join('<br>');
        document.getElementById('errorContent').innerHTML = errorList;
        const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
    } else {
        // Si no hay errores, envía el formulario
        document.querySelector('form').submit();

        // Muestra el modal de éxito
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
    }
});
</script>

<script>
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';  // Cambiar a texto visible
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';  // Cambiar a texto oculto
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
});

document.getElementById('toggleRePassword').addEventListener('click', function() {
    const repasswordInput = document.getElementById('repassword');
    const eyeIconRe = document.getElementById('eyeIconRe');
    if (repasswordInput.type === 'password') {
        repasswordInput.type = 'text';  // Cambiar a texto visible
        eyeIconRe.classList.remove('fa-eye');
        eyeIconRe.classList.add('fa-eye-slash');
    } else {
        repasswordInput.type = 'password';  // Cambiar a texto oculto
        eyeIconRe.classList.remove('fa-eye-slash');
        eyeIconRe.classList.add('fa-eye');
    }
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if(session()->getFlashdata('errorss')): ?>
            var errorModal1 = new bootstrap.Modal(document.getElementById('errorModal1'));
            errorModal1.show();
        <?php endif; ?>
    });
</script>

<!--script>
function toggleOtherField(selectElement) {
    const otraCategoriaDiv = document.getElementById('otraCategoriaDiv');
    const otraCarreraDiv = document.getElementById('otraCarreraDiv');
    const otraDependenciaDiv = document.getElementById('otraDependenciaDiv');

    console.log(selectElement.value); // Imprimir el valor seleccionado
    
    // Comprobar el select específico y mostrar u ocultar el div correspondiente
    if (selectElement.id === 'selectCategoria') {
        if (selectElement.value === 'otra') {
            otraCategoriaDiv.style.display = 'block';
        } else {
            otraCategoriaDiv.style.display = 'none';
        }
    } else if (selectElement.id === 'selectCarrera') {
        if (selectElement.value === 'otra') {
            otraCarreraDiv.style.display = 'block';
        } else {
            otraCarreraDiv.style.display = 'none';
        }
    } else if (selectElement.id === 'selectDependencia') {
        if (selectElement.value === 'otra') {
            otraDependenciaDiv.style.display = 'block';
        } else {
            otraDependenciaDiv.style.display = 'none';
        }
    }
}

</script-->

</body>
</html>







<!-- Modal de Registro Exitoso 
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Registro Exitoso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Registro exitoso, puede revisar la bandeja de entrada del correo que registró para continuar con la inscripción a los cursos y talleres. Gracias.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php //if(session()->getFlashdata('success')): ?>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        <?php //endif; ?>
    });
</script>




 
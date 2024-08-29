<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>

            <?php if(isset($validation)){ ?>
                <div class="alert alert-danger"> 
                    <?php echo $validation->listErrors(); ?>
                </div>        
            <?php } ?>
            
            <form method="POST" action="<?php echo base_url(); ?>/prof_cursos/actualizar" autocomplete="off"> 
                <input type="hidden" value="<?php echo $datos['id_user']; ?>" name="id_user">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $datos['usuario']; ?>" autofocus required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Contraseña</label>
                            <input class="form-control" id="password" name="password" type="password" value="<?php echo $datos['password']; ?>" />
                        </div>                  
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre']; ?>" />
                        </div>
                        <div class="col-12 col-sm-4">
                            <label>Apellido paterno</label>
                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="<?php echo $datos['ap_paterno']; ?>" />
                        </div>
                        <div class="col-12 col-sm-4">
                            <label>Apellido materno</label>
                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" value="<?php echo $datos['ap_materno']; ?>"/>
                        </div>                  
                    </div>
                    <div class="col-12 col-sm-6">
                        <label>Seleccione el rol</label>
                            <select id="cat_rol" name="cat_rol" class="form-select" aria-label="Default select example">
                                <option selected>Abrir para seleccionar opción</option>
                            <?php foreach ($roles as $rol) { ?>
                                <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nom_rol']; ?></option>
                            <?php } ?>
                        </select><br><br>
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url();?>/prof_cursos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>      
            </form>
        </div>
    </main>

    
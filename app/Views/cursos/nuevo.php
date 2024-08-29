<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
            <?php if(isset($validation)){ ?>
                <div class="alert alert-danger"> 
                    <?php echo $validation->listErrors(); ?>
                </div>        
            <?php } ?>          
            <form method="POST" action="<?php echo base_url(); ?>/cursos/insertar" autocomplete="off">
                <div class="col-12 col-sm-6">
                <label>Seleccione el nombre del Profesor</label>
                    <select id="id_usuarios" name="id_usuarios" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?php echo $usuario['id_user']; ?>"><?php echo $usuario['nombre']; ?></option>
                        <?php } ?>
                    </select><br><br>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" autofocus required />
                        </div>                  
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url();?>/cursos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>
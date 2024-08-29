<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
         <form method="POST" action="<?php echo base_url(); ?>/cursos/actualizar" autocomplete="off">
         <input type="hidden" value="<?php echo $datos['id_cursos']; ?>" name="id_cursos" />
         <div class="col-12 col-sm-6">
                <label>Seleccione el motivo</label>
                    <select id="id_usuarios" name="id_usuarios" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?php echo $usuario['id_user']; ?>"><?php echo $usuario['nombre']; ?></option>
                        <?php } ?>
                    </select><br><br>
                </div>
        <div class="col-12 col-sm-6">
                <label>Seleccione el periódo</label>
                    <select id="id_periodo" name="id_periodo" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($periodos as $per) { ?>
                            <option value="<?php echo $per['id']; ?>"><?php echo $per['nombre']; ?></option>
                        <?php } ?>
                    </select><br><br>
                </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nom_curso']; ?>" autofocus require />
                    </div>                  
                </div>
            </div>

                <a href="<?php echo base_url();?>/cursos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            
         </form>
               
        </div>
    </main>
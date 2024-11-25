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
                <div class="row align-items-center">
                <div class="col-12 col-sm-3">
                <label>Seleccione el nombre del Profesor</label>
                    <select id="id_usuarios" name="id_usuarios" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?php echo $usuario['id_user']; ?>"><?php echo $usuario['nombre']; ?></option>
                        <?php } ?>
                    </select><br>
                </div>
                <div class="col-12 col-sm-3">
                    <label>Seleccione el periódo al que corresponde</label>
                    <select id="id_periodo" name="id_periodo" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($periodos as $periodo) { ?>
                            <option value="<?php echo $periodo['id']; ?>"><?php echo $periodo['nombre']; ?></option>
                        <?php } ?>
                    </select><br>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-sm-3">
                    <label>Seleccione la modalidad del curso</label>
                    <select id="selModalidad" name="selModalidad" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($modalidades as $mod) { ?>
                            <option value="<?php echo $mod['id_mod']; ?>"><?php echo $mod['nom_mod']; ?></option>
                        <?php } ?>
                    </select><br>
                </div>
                <div class="col-12 col-sm-3">
                    <label>Seleccione el tipo del curso</label>
                    <select id="selTipo" name="selTipo" class="form-select" aria-label="Default select example">
                        <option selected>Abrir para seleccionar opción</option>
                        <?php foreach ($tiposAct as $tipo) { ?>
                            <option value="<?php echo $tipo['id_tipo_act']; ?>"><?php echo $tipo['nom_tipo_actividad']; ?></option>
                        <?php } ?>
                    </select><br>
                </div>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-3">
                    <label>Fecha inicio:</label>
                    <input type="date" id="fechaIni" name="fechaIni" class="form-control" placeholder="First name" aria-label="Fecha inicio">
                </div>
                <div class="col-sm-3">
                    <label>Fecha inicio:</label>
                    <input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Last name" aria-label="Fecha fin">
                </div>
            </div>
            </div><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" autofocus required />
                        </div>                  
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url();?>/cursos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>
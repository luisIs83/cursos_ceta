<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
         <form method="POST" action="<?php echo base_url(); ?>/cursos/actualizar" autocomplete="off">
         <input type="hidden" value="<?php echo $datos['id_cursos']; ?>" name="id_cursos" />
         
         <div class="row align-items-center">           
            <div class="col-12 col-sm-3">
                <label>Seleccione el nombre del Profesor</label>
                <select id="id_usuarios" name="id_usuarios" class="form-select" aria-label="Default select example">
                    <option <?php echo empty($datos['id_user']) ? 'selected' : ''; ?>>
                        Abrir para seleccionar opción
                    </option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?php echo htmlspecialchars($usuario['id_user'], ENT_QUOTES, 'UTF-8'); ?>" 
                            <?php echo $usuario['id_user'] == $datos['id_usuarios'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
                <div class="col-12 col-sm-3">
                    <label>Seleccione el periódo al que corresponde</label>
                    <select id="id_periodo" name="id_periodo" class="form-select" aria-label="Default select example">
                        <option <?php echo empty($datos['id']) ? 'selected' : ''; ?>>
                            Abrir para seleccionar opción
                        </option>
                        <?php foreach ($periodos as $periodo): ?>
                            <option value="<?php echo htmlspecialchars($periodo['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                <?php echo $periodo['id'] == $datos['id_periodo'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($periodo['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-sm-3">
                    <label>Seleccione la modalidad a la que corresponde</label>
                    <select id="fk_id_modalidad" name="fk_id_modalidad" class="form-select" aria-label="Default select example">
                        <option <?php echo empty($dato['id_mod']) ? 'selected' : ''; ?>>
                            Abrir para seleccionar opción
                        </option>
                        <?php foreach ($modalidades as $dato): ?>
                            <option value="<?php echo htmlspecialchars($dato['id_mod'], ENT_QUOTES, 'UTF-8'); ?>"
                                <?php echo $dato['id_mod'] == $datos['fk_id_modalidad'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($dato['nom_mod'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <div class="col-12 col-sm-3">
                    <label>Seleccione el tipo del curso</label>
                    <select id="fk_id_tipo_act" name="fk_id_tipo_act" class="form-select" aria-label="Default select example">
                        <option <?php echo empty($datos['id_tipo_act']) ? 'selected' : ''; ?>>
                            Abrir para seleccionar opción
                        </option>
                        <?php foreach ($tiposAct as $dato): ?>
                            <option value="<?php htmlspecialchars($dato['id_tipo_act'], ENT_QUOTES, 'UTF-8'); ?>"
                                <?php echo $dato['id_tipo_act'] == $datos['fk_id_tipo_act'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($dato['nom_tipo_actividad'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-3">
                    <label>Fecha inicio:</label>
                    <input type="date" id="" name="fecha_ini" class="form-control" value="<?php echo $datos['fecha_ini']; ?>" >
                </div>
                <div class="col-sm-3">
                    <label>Fecha inicio:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="<?php echo $datos['fecha_fin']; ?>" >
                </div>
            </div>
            </div><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Curso: </label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nom_curso']; ?>"   />
                        </div>                  
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Horario:</label>
                            <textarea class="form-control" id="descripcion" type="text" name="descripcion"><?php echo htmlspecialchars($datos['descripcion']); ?></textarea>
                        </div>
                    </div>
                </div><br>

                <a href="<?php echo base_url();?>/cursos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            
         </form>
               
        </div>
    </main>
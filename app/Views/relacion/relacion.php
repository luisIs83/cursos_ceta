<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
            <!--div class="card mb-4">
                <div class="card-body"-->
                    <?php                   
                    usort($cursos, function($a, $b) {
                        return strcmp($a['nom_curso'], $b['nom_curso']);
                    });
                    ?>
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Curso</th>
                                <th></th>
                                <th></th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                $contador = 1; 
                            foreach($cursos as $curso) { 
                                    $inscrito = in_array($curso['id_cursos'], $inscripciones);
                                ?>
                                <tr>                                                                       
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo $curso['nom_curso']; ?></td>                                    
                                    <td>
                                        <!-- Botón para abrir el modal de detalles -->
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalDetalle<?php echo $curso['id_cursos']; ?>" data-placement="top" type="button" title="Detalle del Curso">
                                            <i class="fas fa-eye" id="eyeIcon"></i> Detalle
                                        </a>
                                    </td>
                                    <td>
                                        <?php if (in_array($curso['id_cursos'], $inscripciones)): ?>
                                            <button class="btn btn-secondary" disabled>Inscrito</button>
                                        <?php else: ?>
                                            <a href="<?php echo base_url() . '/relacion/insertar'; ?>" 
                                            data-idcurso="<?php echo $curso['id_cursos']; ?>" 
                                            data-curso-nombre="<?php echo $curso['nom_curso']; ?>" 
                                            class="btn btn-success inscribirCurso">
                                            <i class="fas fa-calendar-plus"></i> Inscribir</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <!-- Modal para mostrar detalles del curso -->
                                <div class="modal fade" id="modalDetalle<?php echo $curso['id_cursos']; ?>" tabindex="-1" aria-labelledby="detalleModalLabel<?php echo $curso['id_cursos']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="detalleModalLabel<?php echo $curso['id_cursos']; ?>">Detalle del Curso</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Nombre del curso:</strong> <?php echo $curso['nom_curso']; ?></p>
                
                                                <!-- Buscar el nombre del profesor basado en el id_user -->
                                                <p><strong>Nombre del profesor:</strong> 
                                                    <?php foreach ($usuarios as $usuario) {
                                                        if ($usuario['id_user'] == $curso['id_usuarios']) {
                                                            echo $usuario['nombre']. ' ' . $usuario['ap_paterno']. ' ' . $usuario['ap_materno'];
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                                <!-- Buscar el nombre de la modalidad basado en el id_mod -->
                                                <p><strong>Modalidad:</strong> 
                                                    <?php foreach ($modalidades as $modalidad) {
                                                        if ($modalidad['id_mod'] == $curso['fk_id_modalidad']) {
                                                            echo $modalidad['nom_mod'];
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                                <!-- Buscar el nombre del tipo de actividad basado en el id_tipo_act -->
                                                <p><strong>Tipo de actividad:</strong> 
                                                    <?php foreach ($tiposAct as $tipo) {
                                                        if ($tipo['id_tipo_act'] == $curso['fk_id_tipo_act']) {
                                                            echo $tipo['nom_tipo_actividad'];
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </p>

                                                <p><strong>Fecha inicio:</strong> <?php echo $curso['fecha_ini']; ?></p>

                                                <p><strong>Fecha fin:</strong> <?php echo $curso['fecha_fin']; ?></p>

                                                <p><strong>Horario:</strong> <?php echo $curso['descripcion']; ?></p>

                                                

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                <!--/div>
            </div-->
            <body>
                <div class="row">
                <div class="col-sm-4"></div>                
                        <div class="col-sm-4">
                            <div class="card text-center text-dark bg-light mb-3 border-info" style="width: 25rem;">
                                <div class="card-header"><h3>Aviso importante:</h3></div>
                            <div class="card-body">
                                    <p>
                                        <H5>Si desea anular la inscripción a alguno de los cursos envíe un correo a <strong>ceta@zaragoza.unam.mx</strong></H5>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <div class="col-sm-4"></div>
                </div>
            </body>
        </div>
    </main>

    
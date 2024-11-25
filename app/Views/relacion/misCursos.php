<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Curso</th>
                                <th></th>
                                <th></th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($cursos as $curso) { ?>
                                <tr>                                                                       
                                    <td><?php echo $curso['id_cursos']; ?></td>
                                    <td><?php echo $curso['nom_curso']; ?></td>                                    
                                    <td>
                                        <!-- Botón para abrir el modal de detalles -->
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalDetalle<?php echo $curso['id_cursos']; ?>" data-placement="top" type="button" title="Detalle del Curso">
                                            <i class="fas fa-eye" id="eyeIcon"></i> Detalle
                                        </a>
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

                                                <p><strong>Descripción del curso:</strong> <?php echo $curso['descripcion']; ?></p>
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
                </div>
            </div>
        </div>
    </main>

    
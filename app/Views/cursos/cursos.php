<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>/cursos/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>/cursos/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>
            <div class="card mb-4">
                <div class="card-body">
                    <?php                   
                    usort($datos, function($a, $b) {
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
                                <th></th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                $contador = 1;
                            foreach($datos as $dato) { ?>
                                <tr>                                                                       
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo $dato['nom_curso']; ?></td>
                                    <td><a href="<?php echo base_url() . '/cursos/editar/' . $dato['id_cursos']; ?>" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td>
                                    <td><a href="#" data-href="<?php echo base_url() . '/cursos/eliminar/' . $dato['id_cursos']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" type="button" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></a></td>
                                </tr>                                
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    
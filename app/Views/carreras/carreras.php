<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>/carreras/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>/carreras/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Carrera</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id_carrera']; ?></td>
                                    <td><?php echo $dato['nom_carrera']; ?></td>
                                    <td><a href="<?php echo base_url() . '/carreras/editar/' . $dato['id_carrera']; ?>" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td>
                                    <td><a href="#" data-href="<?php echo base_url() . '/carreras/eliminar/' . $dato['id_carrera']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" type="button" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></a></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
   <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Atención</h1>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <p>Desea eliminar registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a class="btn btn-danger btn-ok">Aceptar</a>
      </div>
    </div>
  </div>
</div>
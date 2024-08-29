<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>/dependencias" class="btn btn-warning">Dependencias</a>
            </p>
        </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Carrera</th>
                                <th>Regresar a lista</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id_dep']; ?></td>
                                    <td><?php echo $dato['nom_dep']; ?></td>
                                    <td><a href="#" data-href="<?php echo base_url() . '/dependencias/reingresar/' . $dato['id_dep']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" type="button" class="btn btn-warning"><i class="fa-solid fa-arrow-alt-circle-up"></i></a></td>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Atención!</h1>
            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
        </div>
        <div class="modal-body">
            <p>Desea regresar el registro a la lista de Dependencias?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a class="btn btn-danger btn-ok">Aceptar</a>
        </div>
    </div>
</div>
</div>
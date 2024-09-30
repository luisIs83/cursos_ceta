<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
        
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-primary table-striped">

                        <thead>
                            <tr>
                               
                                <th>Curso</th>
                                <th>Eliminar</th>
                                <th>Ver</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($datos as $dato) { ?>
                                <tr>                                                                       
                                    
                                    <td><?php echo $dato['nom_curso']; ?></td>
                                    <td><a href="" class="btn btn-warning"><i class="fa-duotone fa-solid fa-trash-can"></i></a></td>
                                    <td><a href="<?php echo base_url() . '/reportes/ver/'  ?>" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td>
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
                 <p>Desea eliminar registro?</p>
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <a class="btn btn-danger btn-ok">Aceptar</a>
          </div>
      </div>
  </div>
</div>


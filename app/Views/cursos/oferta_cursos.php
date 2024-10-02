<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <div>
            <!--<p>
                <a href="<?php echo base_url(); ?>/cursos/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>/cursos/eliminados" class="btn btn-warning">Eliminados</a>
            </p>-->
        </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="" class="table table-primary table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Curso: </th>
                            
                                <th>Ver: </th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($datos as $dato) { ?>
                                <tr>                                                                       
                                    <td><?php echo $dato['id_cursos']; ?></td>
                                    <td><?php echo $dato['nom_curso']; ?></td>
                                    
                                    <td><a href="#" data-href="" 
                                      data-bs-toggle="modal" 
                                      data-bs-target="#modal-informa" 
                                      data-placement="top" 
                                      data-nom-curso="<?php echo $dato['nom_curso']; ?>"
                                      type="button" title="" class="btn btn-primary">Información del curso</a></td>
                                    
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modal-informa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
           <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Curso: </h1>
                 <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
              </div>
                <div class="modal-body">
                  <p>Profesor Titular: <span id="modal-curso-profesor"></span></p>
                  <p>Fecha inicio: <span id="modal-curso-fecha-inicio"></span></p>
                  <p>Fecha fin: <span id="modal-curso-fecha-fin"></span></p>
                  <p>Horario: <span id="modal-curso-horario"></span></p>
                  <p>Modalidad: <span id="modal-curso-modalidad"></span></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <td><a href="#" data-href="<?php echo base_url() . '/cursos/eliminar/' . $dato['id_cursos']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" type="button" title="Eliminar registro" class="btn btn-primary">Inscribirme</a></td>
                </div>
           </div>
       </div>
    </div>

    <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
           <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Atención!</h1>
                 <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
              </div>
                <div class="modal-body">
                  <p>¿Desea inscribirse a este curso?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <a class="btn btn-danger btn-ok">Aceptar</a>
                </div>
           </div>
       </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    var modalInforma = document.getElementById('modal-informa');

    modalInforma.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botón que disparó el modal
        var curso = button.getAttribute('data-nom-curso');
        //var profesor = button.getAttribute('data-profesor');
        //var fechaInicio = button.getAttribute('data-fecha-inicio');
        //var fechaFin = button.getAttribute('data-fecha-fin');
        //var horario = button.getAttribute('data-horario');
        //var modalidad = button.getAttribute('data-modalidad');

        // Actualizar el contenido del modal
        var modalTitulo = modalInforma.querySelector('.modal-title');
        //var modalProfesor = modalInforma.querySelector('#modal-curso-profesor');
        //var modalFechaInicio = modalInforma.querySelector('#modal-curso-fecha-inicio');
        //var modalFechaFin = modalInforma.querySelector('#modal-curso-fecha-fin');
        //var modalHorario = modalInforma.querySelector('#modal-curso-horario');
        //var modalModalidad = modalInforma.querySelector('#modal-curso-modalidad');

        modalTitulo.textContent = 'Curso: ' + curso;
        //modalProfesor.textContent = profesor;
        //modalFechaInicio.textContent = fechaInicio;
        //modalFechaFin.textContent = fechaFin;
        //modalHorario.textContent = horario;
        //modalModalidad.textContent = modalidad;

        // Actualizar el enlace de inscripción
        var inscribirme = modalInforma.querySelector('#inscribirme');
        inscribirme.setAttribute('href', button.getAttribute('data-href'));
    });
});
</script>

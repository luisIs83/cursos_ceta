<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Centro de Tecnologías para el Aprendizaje <?php echo date('Y'); ?></div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js" ></script>
<script src="<?php echo base_url(); ?>/js/sweetalert2@11.js" ></script>
<script src="<?php echo base_url(); ?>/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js" ></script>
<script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>
<script src="<?php echo base_url(); ?>/jquery/jquery.min"></script>
<script src="<?php echo base_url(); ?>/assets/demo/datatables-demo.js"></script>
<script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url(); ?>/assets/demo/chart-bar-demo.js"></script>
<script src="<?php echo base_url(); ?>/css/bootstrap.min.css"></script>

<script>
    $('#modal-confirma').on('show.bs.modal', function(e){
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script>
    $(document).ready(function(){
        $('.inscribirCurso').click(function(e){
            e.preventDefault(); // Evitar recarga de página
            
            var button = $(this);
            var idCurso = button.data('idcurso');
            var cursoNombre = button.data('curso-nombre');

            // Mostrar el modal de confirmación con SweetAlert
            Swal.fire({
                title: 'Confirmar inscripción',
                text: '¿Desea confirmar la inscripción al curso "' + cursoNombre + '"?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, procede con la inscripción
                    button.prop('disabled', true);

                    $.ajax({
                        url: '<?php echo base_url(); ?>/relacion/insertar',
                        method: 'POST',
                        data: {
                            nombre_curso: idCurso,
                            // Otros campos adicionales si es necesario
                        },
                        success: function(response) {
                            if (response.success) {
                                // Cambiar el botón a "Inscrito" y mantenerlo deshabilitado
                                button.removeClass('btn-success inscribirCurso')
                                      .addClass('btn-secondary')
                                      .text('Inscrito');
                            } else {
                                Swal.fire('Error', response.message || 'Ocurrió un error al inscribirse', 'error');
                                button.prop('disabled', false); // Volver a habilitar si hay un error
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Ocurrió un error al intentar inscribirse', 'error');
                            button.prop('disabled', false); // Volver a habilitar si hay un error
                        }
                    });
                } else {
                    // Si el usuario selecciona "No"
                    Swal.fire('Cancelado', 'Inscripción cancelada', 'info');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.listaCurso').click(function(e){
            e.preventDefault(); // Evitar recarga de página
            
            var button = $(this);
            var idCurso = button.data('idcur');
            var cursoNombre = button.data('curso-nombre');

            // Mostrar el modal de confirmación con SweetAlert
            Swal.fire({
                title: 'Confirmar ingreso a lista de espera',
                text: '¿Desea confirmar el ingreso a la lista de espera al curso "' + cursoNombre + '"?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, procede con la inscripción
                    button.prop('disabled', true);

                    $.ajax({
                        url: '<?php echo base_url(); ?>/relacion/insertar',
                        method: 'POST',
                        data: {
                            nombre_curso: idCurso,
                            // Otros campos adicionales si es necesario
                        },
                        success: function(response) {
                            if (response.success) {
                                // Cambiar el botón a "Inscrito" y mantenerlo deshabilitado
                                button.removeClass('btn-success listaCurso')
                                      .addClass('btn-secondary')
                                      .text('En lista de espera');
                            } else {
                                Swal.fire('Error', response.message || 'Ocurrió un error al inscribirse', 'error');
                                button.prop('disabled', false); // Volver a habilitar si hay un error
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Ocurrió un error al intentar inscribirse', 'error');
                            button.prop('disabled', false); // Volver a habilitar si hay un error
                        }
                    });
                } else {
                    // Si el usuario selecciona "No"
                    Swal.fire('Cancelado', 'Inscripción cancelada', 'info');
                }
            });
        });
    });
</script>


</body>

</html>


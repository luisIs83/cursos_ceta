<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
         <form method="POST" action="<?php echo base_url(); ?>/categorias/actualizar" autocomplete="off">
         <input type="hidden" value="<?php echo $datos['id_cat']; ?>" name="id_cat" />
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nom_cat']; ?>" autofocus require />
                    </div>                  
                </div>
            </div>

                <a href="<?php echo base_url();?>/categorias" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            
         </form>
               
        </div>
    </main>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
         <form method="POST" action="<?php echo base_url(); ?>/modalidades/actualizar" autocomplete="off">
         <input type="hidden" value="<?php echo $modalidades['id_mod']; ?>" name="id_mod" />
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Nombre</label>
                        <input class="form-control" id="nomMod" name="nomMod" type="text" value="<?php echo $modalidades['nom_mod']; ?>" autofocus require />
                    </div>                  
                </div>
            </div>
                <br>
                <a href="<?php echo base_url();?>/modalidades" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            
         </form>
               
        </div>
    </main>
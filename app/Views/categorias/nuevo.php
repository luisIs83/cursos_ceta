<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>

            <?php if(isset($validation)){ ?>
                <div class="alert alert-danger"> 
                    <?php echo $validation->listErrors(); ?>
                </div>        
            <?php } ?>
            
            <form method="POST" action="<?php echo base_url(); ?>/categorias/insertar" autocomplete="off">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" autofocus require />
                        </div>                  
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url();?>/categorias" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
            </form>
            
        </div>
    </main>
<?= $header?>
<!-- <?php print_r($libro);?> -->
<!-- Para saber si esta llegando la información. -->
<br>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><center>Editar datos del libro</center></h5>
        <p class="card-text">
            <!-- b-form-enctype -->
            <form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$libro['id']?>"> <!--Para saber que llega nuestro id (type="text") para corroborar--> 
                <!-- b-form-group  -->
                <div class="form-group">
                    <label for="nombre">Nombre del libro</label>
                    <input id="nombre" value="<?=$libro['nombre'];?>" class="form-control" type="text" name="nombre">
                </div>
                <!-- b-form-file  -->
                <div class="form-group">
                    <label for="imagen">Imagen actual:</label>
                    <br>
                    <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$libro['imagen'];?>" width="200" alt="">
                    <br><br>
                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                </div>
                <!-- b-btn   -->
                <button class="btn btn-success" type="submit">Actualizar</button>
                <a class="btn btn-info" href="<?=base_url('listar')?>">Cancelar<br></a>
            </form>
        </p>
    </div>
</div>
    
<?= $footer?>  
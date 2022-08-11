<?= $header?>
<!-- <a href="http://localhost/GitHub_Home/biblioteca/public/listar">Regresar.<br></a> -->
<!-- Formulario de crear libros -->
<!-- b-card -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><center>Ingresar datos del libro</center></h5>
        <p class="card-text">
            <!-- b-form-enctype -->
            <form method="post" action="<?=site_url('/guardar')?>" enctype="multipart/form-data">
                <!-- b-form-group  -->
                <div class="form-group">
                    <label for="nombre">Nombre del libro</label>
                    <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre">
                </div>
                <!-- b-form-file  -->
                <div class="form-group">
                    <label for="imagen">Adjuntar imagen:</label>
                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                </div>
                <!-- b-btn   -->
                <button class="btn btn-success" type="submit">Guardar</button>
                <a class="btn btn-info" href="<?=base_url('listar')?>">Cancelar<br></a>
            </form>
        </p>
    </div>
</div>

<?= $footer?>   
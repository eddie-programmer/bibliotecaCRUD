    <!-- Lista de libros VIEW -->
    <?php
    // print_r($libros); //consulta array desde DB
    // //$datos['libros']=$libro->orderBy('id','ASC')->findAll();
    // foreach ($libros as $key) {
    //     echo $key['id'].'<br>';
    // }
    ?>
<?= $header?>
<br><br>
<a class="btn btn-success" href="<?=base_url('crear')?>">Crear un libro</a>
<br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($libros as $libro): ?> <!--Recorre array $libros y guarda en $libro-->

            <tr>
                <td><?php echo $libro['id']; ?></td> 
                <td>
                    <!-- <?php echo $libro['imagen']; ?> -->
                    <!-- b-img-thumbnail -->
                    <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$libro['imagen'];?>" width="200" alt="">
                </td>
                <td><?php echo $libro['nombre']; ?></td>
                <td>   
                <a href="<?=base_url('editar/'.$libro['id']);?>" id="" class="btn btn-info" type="button">Editar</a>        
                <a href="<?=base_url('borrar/'.$libro['id']);?>" id="delete" class="btn btn-danger" type="button">Borrar</a>
                <!-- href lleva a routes y en este caso enviaremos parametro $libro['id'] -->
                </td>
            </tr>

        <?php endforeach; ?>      

        </tbody>
    </table>

<!-- <script>
    
    (function(){
        Swal.fire({
        title: '¿Quieres eliminar el registro?',
        text: "El registro sera eliminado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            //ajax...
            Swal.fire(
            'Eliminado!',
            'Tu registro se ha eliminado de manera correcta.',
            'success'
            )
        }
        })
    })();


</script> -->

<?= $footer?>            

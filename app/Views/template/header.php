<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">Biblioteca</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('listar')?>">Libros<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Lista de libros VIEW -->
    <?php
    // print_r($libros); //consulta array desde DB
    // //$datos['libros']=$libro->orderBy('id','ASC')->findAll();
    // foreach ($libros as $key) {
    //     echo $key['id'].'<br>';
    // }
    ?>
    <div class="container">
        <? if($session('mensaje')){ ?>

        <div class="alert alert-danger" role="alert">
            <?php 
            echo session('mensaje');
            ?>
        </div>

        <? } ?>
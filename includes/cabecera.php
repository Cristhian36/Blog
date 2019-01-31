<?php  require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helper.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Blog</title>
</head>

<body>
    <!--Cabecera -->
    <header  id="cabecera">
        <div id="logo">
            <a href="Index.php">Hazlo Divertido</a>
        </div> 


        <!--Menu -->
        
        <nav id="navegador">
            <ul>
                <li><a href="">Inicio</a></li>
                <li>
                    <?php $categorias = conseguircategoria($db);
                        if(!empty($categorias)):
                            while($categoria = mysqli_fetch_assoc($categorias)) :
                    ?>
                        <li>
                            <a href="categoria.php?id=<?=$categoria['id'];?>"> <?= $categoria['nombre'];?></a>
                        </li>
                    <?php
                            endwhile;
                     endif;?>
                     
                </li>
                
                <li><a href="">Sobre mi</a></li>
                <li><a href="">contacto</a></li>
            </ul>
        </nav>

        <div class="clearfix"></div>

    </header>

   
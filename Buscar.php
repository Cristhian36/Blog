<?php

   
if(!isset($_POST['busqueda'])){
    header('Location: Index.php');
}

   
?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>

  <!--Caja principal-->
  <div id="principal">


        
            <h1>Busqueda: <?= $_POST['busqueda']?></h1>
            <?php   $entradas = conseguirentradas($db,NULL ,NULL, $_POST['busqueda']);

                  if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):                        
                    while($entrada = mysqli_fetch_assoc($entradas)):
               ?>
                       <article class="entrada">
                            <a href="entrada.php?id=<?=$entrada['id']?>">
                              <h2><?= $entrada['titulo']?></h2>
                                <span><?= $entrada['categoria'].' | '.$entrada['fecha']?></span>
                                     <p>
                                      <?= substr($entrada['descripcion'], 0, 200)."..."?>
                                    </p>  
                                </a>               
                            </article> 
                  <?php 
                        endwhile;
                    else:
                  ?>
                    <div class="alert">No hay entradas</div>
                   <?php
                      endif;
                  ?>
                

    <?php require_once 'includes/footer.php' ?>

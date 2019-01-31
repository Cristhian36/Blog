<?php require_once 'includes/helper.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php 
   $categoria_actual = conseguirentradas($db, $_GET['id']);
   
   if(!isset($categoria_actual['id'])){
       header('Location: Index.php');
   }

?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>

  <!--Caja principal-->
  <div id="principal">


            
            <h1>Entradas de <?=$categoria_actual['nombre']?></h1>
            <?php $entradas = conseguirentradas($db, null,$_GET['id'] ); 
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
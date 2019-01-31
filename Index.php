<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>



  <!--Caja principal-->
  <div id="principal">
            
            <h1>Ultima entrada</h1>
            <?php $entradas = conseguirentradas($db, TRUE); 
                  if(!empty($entradas)):                        
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
                      endif;
                  ?>

    <?php require_once 'includes/footer.php' ?>


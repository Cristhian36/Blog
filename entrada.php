<?php require_once 'includes/helper.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php 
   $entrada_actual = conseguirentrada($db, $_GET['id']);
   
   if(!isset($entrada_actual['id'])){
       header('Location: Index.php');
   }

?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>

  <!--Caja principal-->
  <div id="principal">


            
            <h1><?=$entrada_actual['titulo']?></h1>
                <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
                <h2><?=$entrada_actual['categoria']?></h2>
                </a>
                <h2><?=$entrada_actual['usuario']?></h2>
            <p><?=$entrada_actual['descripcion']?></p>

            <?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
                        <a href="editar_entradas.php?id=<?=$entrada_actual['id']?>" class="boton">Editar entradas</a>
                        <a href="borrar_entradas.php?id=<?=$entrada_actual['id']?>" class="boton boton-rojo">Borrar entrada</a>
            <?php endif;?>
                

    <?php require_once 'includes/footer.php' ?>
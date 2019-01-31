<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>
<?php require_once 'includes/redireccion.php'; ?>

 <!--Caja principal-->
     <div id="principal">

<?php if(isset($_SESSION['Complete'])) :?>
    <div class="alert alert-sucess">
        <?= $_SESSION['Complete'] ?>
    </div>

    <?php elseif(isset($_SESSION['error']['general'])): ?>
    <div class="alert">
        <?= $_SESSION['error']['general'] ?>
    </div>
    <?php endif ?>


    <form action="Actualizar_usuario.php" method="POST">
            <label for="nombre">nombre</label>
            <input type="text" placeholder="Usuario" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>">

            <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'nombre') : '';  ?>                                              
            
        <label for="apellido">apellido</label>
        <input type="text" placeholder="Usuario" name="apellido" value="<?=$_SESSION['usuario']['apellidos']?>">

        
        <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'apellido') : '';  ?>  

        <label for="email">Email</label>
        <input type="email" placeholder="Usuario" name="email" value="<?=$_SESSION['usuario']['email']?>">

        
        <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'email') : '';  ?>  
  

        <input type="submit" name="submit" value="Actualizar">
    </form>
    <?php deleteerror(); ?>



<?php require_once 'includes/footer.php' ?>


<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>

 <!--Caja principal-->
        <div id="principal">
          <h1>Crear categoria</h1>
            <p>Añade nuevas categorias</p>
            
            <form action="guardar-categoria.php" method="POST">
                <label for=nombre>Nombre de la categoria<label>
                <input type="text" name=nombre />

                <input type="submit" values="Guardar">
            
            </form>
            
    

    <?php require_once 'includes/footer.php' ?>
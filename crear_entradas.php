<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/Lateral.php'; ?>
<?php require_once 'includes/redireccion.php'; ?>

 <!--Caja principal-->
        <div id="principal">
          <h1>Crear entrada</h1>
            <p>Añade nuevas entradas</p>
            
            <form action="guardar-entradas.php" method="POST">
 
                <label for="titulo">Titulo<label>
                <input type="text" name="titulo"/>

                <?php echo isset($_SESSION["errores_entrada"]) ? Viewerror($_SESSION["errores_entrada"], 'titulo') : ' '?>

                <label for="descripcion">Descrripcion<label>
                <textarea name="descripcion"></textarea>

                <?php echo isset($_SESSION["errores_entrada"]) ? Viewerror($_SESSION["errores_entrada"], 'descripcion') : ' '?>
                                             
                <label for="categoria">Categoria<label>
                <select name="categoria">
                    <?php $categorias = conseguircategoria($db);
                        if(!empty($categorias)):
                         while($categoria = mysqli_fetch_assoc($categorias)) :

                      ?>
                            <option value="<?=$categoria['id']?>">
                                <?= $categoria['nombre'] ?>

                            </option>
                            
                            <?php echo isset($_SESSION["errores_entrada"]) ? Viewerror($_SESSION["errores_entrada"], 'categoria') : ' '?>

                        <?php 
                            
                            endwhile;
                            endif;
                            ?>

                </select>

                <input type="submit" values="Guardar">
            
            </form>
            
            <?php deleteerror(); ?>
    

    <?php require_once 'includes/footer.php' ?>
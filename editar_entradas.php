<?php require_once 'includes/redireccion.php'; ?>
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
          <h1>Editar entrada</h1>
            <p>Edita tus entradas <?=$entrada_actual['titulo']?> </p>
            
            <form action="guardar-entradas.php?editar=<?=$entrada_actual['id']?>" method="POST">
 
                <label for="titulo">Titulo<label>
                <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>

                <?php echo isset($_SESSION["errores_entrada"]) ? Viewerror($_SESSION["errores_entrada"], 'titulo') : ' '?>

                <label for="descripcion">Descrripcion<label>
                <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>

                <?php echo isset($_SESSION["errores_entrada"]) ? Viewerror($_SESSION["errores_entrada"], 'descripcion') : ' '?>
                                             
                <label for="categoria">Categoria<label>
                <select name="categoria">
                    <?php $categorias = conseguircategoria($db);
                        if(!empty($categorias)):
                         while($categoria = mysqli_fetch_assoc($categorias)) :

                      ?>
                            <option value="<?=$categoria['id']?>"<?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"': '' ?>>
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
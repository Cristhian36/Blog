 <?php
 require_once 'includes/conexion.php';

 if(isset($_SESSION['usuario']) && isset($_GET['id'])){
     $entradas_id = $_GET['id'];
     $usuario_id = $_SESSION['usuario']['id'];
     $sql = "DELETE FROM entradas 
     WHERE usuario_id = $usuario_id AND id = $entradas_id";
     $query = mysqli_query($db, $sql);


 }

 header('Location: Index.php');
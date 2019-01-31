<?php

if(isset($_POST)){
    
    require_once "includes/conexion.php";

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categorias =  isset($_POST['categoria']) ?  (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];
    
    $error = array();

    if(empty($titulo)){
        $error['titulo'] = "Titulo no valido";
    }

    if(empty($descripcion)){
        $error['descripcion'] = "Descripcion no valida";
    }


    if(empty($categorias) && !is_numeric($categorias)){
        $error['categorias'] = "Categoria no valida";
    }

    if(count($error) == 0){
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', categoria_id = '$categorias' 
            WHERE id = $entrada_id AND usuario_id = $usuario_id";

        }else{
            $sql = "INSERT INTO entradas VALUES(NULL,'$titulo', '$descripcion', CURDATE(), $usuario , $categorias);";
        }
        $guardar = mysqli_query($db, $sql);

        
        header("Location: Index.php");
      
    }else{
        
        $_SESSION["errores_entrada"] = $error;
        if(isset($_GET['editar'])){
            header("Location: editar_entradas.php?id=".$_GET['editar']);
        }else{
        header("Location: crear_entradas.php");
        }

       
        
    }


}

<?php

function Viewerror($error, $campo){
      $alert = '';

    if(isset($error[$campo]) && !empty($campo)){
        $alert = "<div class='alert'>".$error[$campo].'</div>';
    }
    return $alert;
}

function deleteerror(){
    $delete =false;

    if(isset($_SESSION['error'])){
    $_SESSION['error'] = null;
    $delete = true;
    }

    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        
        }


    if(isset($_SESSION['Complete'])){
    $_SESSION['Complete'] = null;
    $delete = true; 
    }

    return $delete;
}

function conseguircategoria($conexion){
 
    $sql = "SELECT * FROM categorias ORDER BY id asc;";
    $categoria = mysqli_query($conexion, $sql); 

    $result = array();

    if($categoria && mysqli_num_rows($categoria) >= 1){
        $result = $categoria;

    }

    return $result;
}

function conseguircategorias($conexion, $id){
 
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categoria = mysqli_query($conexion, $sql); 

    $result = array();

    if($categoria && mysqli_num_rows($categoria) >= 1){
        $result = mysqli_fetch_assoc($categoria);

    }

    return $result;
}

function conseguirentrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre as 'categoria', CONCAT(u.nombre, ' ', u.apellidos) as 'usuario' FROM entradas e
            INNER JOIN categorias c ON e.categoria_id = c.id
            INNER JOIN usuarios u ON e.usuario_id = u.id
            WHERE e.id = $id";

            $entrada = mysqli_query($conexion, $sql);

            $error= array();

            if($entrada && mysqli_num_rows($entrada) >= 1){
                $error = mysqli_fetch_assoc($entrada);
            }
 
            return $error;
  
}


function conseguirentradas($conexion, $limit = NULL, $categoria = NULL, $busqueda = NULL){
  $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e
   INNER JOIN categorias c ON e.categoria_id = c.id ";

    if(!empty($categoria)){
       $sql .= "WHERE e.categoria_id = $categoria ";
   }



    if(!empty($busqueda)){
       $sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
   }

   
  

   $sql .=  "ORDER BY e.id DESC ";

    if($limit){
        $sql .= "LIMIT 4";
    } 

  $entradas = mysqli_query($conexion,$sql);

  $result = array();
  
  if($entradas && mysqli_num_rows($entradas) >= 1){
    
      $result = $entradas;
  }

  return $entradas;
}



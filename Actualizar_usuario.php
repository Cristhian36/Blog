<?php

if(isset($_POST)){

    
        require_once 'includes/conexion.php';

        if(!isset($_SESSION)){
        session_start();
        }

    // Recoger los valores del formulario de actualizacion

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'] ) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    // Errores en array

    $error = array();


   //Validar nombre

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validate = true;
    }else{
        $nombre_validate = false;
        $error['nombre'] = "Nombre no valido";
    }


    //Validar apellido
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_validate =true;
    }else{
        $apellido_validate = false;
        $error['apellido'] = "Apellido no valido";
    }


    //Validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validate = true;
    }else{
        $email_validate = false;
        $error['email'] = "Email no valido";
    }


    //Insetar usuario

    $Guardar_usuario = false;

    if(count($error) == 0){
        $usuario = $_SESSION['usuario']['id'];
        
        $Guardar_usuario = true;

        //Comprobar email existente
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email );

        if( $isset_user['id'] == $usuario || empty($isset_user)){

        //Actualizar usuarip en la 
     
        $sql = "UPDATE usuarios SET nombre = '$nombre',
        apellidos = '$apellido', email = '$email' 
        where id = $usuario";
        $query = mysqli_query($db,$sql);

        

        if($query){
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellido'] = $apellido;
            $_SESSION['usuario']['email'] = $email;

            $_SESSION['Complete'] = "La actualizacion se completo corectamente";

        }else{
          
    
            $_SESSION['error']['general'] = "Fallo al actualizar";
        }

    }else{
        $_SESSION['error']['general'] = "El usuario ya existe";
    }

    }else{
        $_SESSION['error'] = $error;
    }
}

header('Location: mis_datos.php');
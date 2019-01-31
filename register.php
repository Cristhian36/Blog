<?php


if(isset($_POST)){

    
        require_once 'includes/conexion.php';

        if(!isset($_SESSION)){
        session_start();
        }

    // Recoger los valores del formulario registro

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'] ) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Errores en array

    $error = array();


   //Validar los campos

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

    //Validar contraseña
    if(!empty($password)){
        $password_validate = true;
    }else{
        $password_validate = false;
        $error['password'] = "La password esta Vacia";
    }


    //Insetar usuario

    $Guardar_usuario = false;

    if(count($error) == 0){
        
        $Guardar_usuario = true;

        //Cifrar contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' =>4]);

        $sql = "INSERT INTO usuarios VALUES(null, '$nombre' , '$apellido' , '$email' , '$password_segura' ,CURDATE());";
        $query = mysqli_query($db,$sql);


        if($query){
            $_SESSION['Complete'] = "El registro se completo corectamente";

        }else{
            $_SESSION['error']['general'] = "Fallo al guardar el usuario";
        }

    }else{
        $_SESSION['error'] = $error;
    }
}

header('Location: Index.php');
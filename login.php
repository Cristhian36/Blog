 <?php

//Iniciar la sesion y la conexion a bd
require_once 'includes/conexion.php';

//Recoger datos del formulario
if(isset($_POST)){
    //Borrar error antiguo
    if(isset($_SESSION['error_login'])){
      session_unset($_SESSION['error_login']);
    }

    //Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Consulta para comprobar credenciales 
     $sql = "SELECT * FROM usuarios where email = '$email'";
     $login = mysqli_query($db, $sql);

     

     if($login && mysqli_num_rows($login) == 1){
        $usuario =  mysqli_fetch_assoc($login);

        //Comprobar la contraseña 
        $verify = password_verify($password, $usuario['password']);

        if($verify){
        //Utilizar una sesion para guardar datos del usuario logueado
         $_SESSION['usuario'] = $usuario;

        }else{
        //Si algo falla enviar una session con el fallo
         $_SESSION['error_login'] = "Datos incorrectos!!";
        }

     }else{
        //Mensaje de error
        $_SESSION['error_login'] = "Datos incorrectos!!";
     }

}


//Redirigir al Index.php
header('Location: index.php');

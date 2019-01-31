     <!--Barra lateral-->
     <div class="container">
         
        <aside id="sidebar">
                            
                        <div id="buscador" class="aside-block">
                            <h3>Buscar</h3>
                            <form action="buscar.php" method="POST">
                                <label for="busqueda">Buscar</label>
                                <input type="text" placeholder="Busqueda" name="busqueda">
                                <input type="submit" value="Buscar">
                            </form>
                        </div>

                <?php if(isset($_SESSION['usuario'])) : ?>
                <div id="login" class="aside-block">
                        <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?></h3>
                        <!--Botones -->
                        <a href="mis_datos.php" class="boton">Mis datos</a>
                        <a href="crear_categoria.php" class="boton boton-negro">Crear categoria</a>
                        <a href="crear_entradas.php" class="boton ">Crear Entrada</a>
                        <a href="cerrar.php" class="boton boton-rojo">Cerrar sesion</a>
                </div>
          
                <?php endif; ?>

                    <?php if(!isset($_SESSION['usuario'])) : ?>
                        <div id="login" class="aside-block">
                            <h3>Login</h3>

                            <?php if(isset($_SESSION['error_login'])) : ?>
                            <div class="alert">
                                    <?= $_SESSION['error_login']; ?>
                            </div>
                    
                            <?php endif; ?>
                            

                            <form action="login.php" method="POST">
                                <label for="email">Email</label>
                                <input type="email" placeholder="Usuario" name="email">

                                <label for="Password">Password</label>
                                <input type="password" placeholder="Password" name="password">

                                <input type="submit" value="Enviar">
                            </form>
                        </div>

                    

                        <div id="Register" class="aside-block">
                            <h3>Register</h3>
                            <?php if(isset($_SESSION['Complete'])) :?>
                            <div class="alert alert-sucess">
                                <?= $_SESSION['Complete'] ?>
                            </div>

                            <?php elseif(isset($_SESSION['error']['general'])): ?>
                            <div class="alert">
                                <?= $_SESSION['error']['general'] ?>
                            </div>
                            <?php endif ?>


                            <form action="register.php" method="POST">
                                    <label for="nombre">nombre</label>
                                    <input type="text" placeholder="Usuario" name="nombre">

                                    <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'nombre') : '';  ?>                                              
                                    
                                <label for="apellido">apellido</label>
                                <input type="text" placeholder="Usuario" name="apellido">

                                
                                <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'apellido') : '';  ?>  

                                <label for="email">Email</label>
                                <input type="email" placeholder="Usuario" name="email">

                                
                                <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'email') : '';  ?>  

                                <label for="Password">Password</label>
                                <input type="password" placeholder="Password" name="password">

                                
                                <?php echo isset($_SESSION['error']) ? Viewerror($_SESSION['error'], 'password') : '';  ?>  

                                <input type="submit" name="submit" value="Registrarse">
                            </form>
                            <?php deleteerror(); ?>

                       
                 </div>
            <?php endif;?>
        </aside>

      
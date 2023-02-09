<?php
    //Conectarse a la base de datos 
    require 'includes/config/database.php';
    $db = conectarDb();
    //Autenticar el usuario
    $errores = [];


    if($_SERVER ['REQUEST_METHOD'] === 'POST'){ 
        $email = mysqli_real_escape_string($db, filter_var($_POST ['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST ['password']); 

        if (!$email){
            $errores [] = "El email es obligatorio o no es valido";
        }
        if(!$password){
            $errores [] = "El password es obligatorio"; 
        }

        if (empty($errores)){
            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query ($db, $query);
            if($resultado -> num_rows){
                //Revisar el password
                $usuario = mysqli_fetch_assoc($resultado);
                 
                //Verificar el password
                $auth = password_verify($password, $usuario['password']);
                if($auth){
                    //El usuario esta autenticado
                    session_start();
                    $_SESSION ['usuario'] = $usuario['email'] ;
                    $_SESSION ['login'] = true ;

                header('Location: ./admin/index.php');
                }else{
                    $errores [] = "El password es incorrecto" ;
                }
            }else{
                $errores[] = "El usuario no existe ";
            }
        }
    }
    //Inclure el Header
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Iniciar Sesion</h1>
        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        
        <?php endforeach; ?>
        <form class="formulario" method="POST" novalidate>
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name = "email" placeholder="Tu Email" id ="email">

                <label for="password">Password</label>
                <input type="password" name = "password" placeholder="Tu password" id ="password">

            </fieldset>

            <input type = "submit" Value = "Iniciar Sesión" class = "boton boton-verde">

        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>
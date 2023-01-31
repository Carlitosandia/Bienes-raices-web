<?php
    //Autenticar el usuario
    if($_SERVER ['REQUEST_METHOD'] === 'POST'){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }
    //Inclure el Header
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Iniciar Sesion</h1>
        <form method="POST" class="formulario">
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
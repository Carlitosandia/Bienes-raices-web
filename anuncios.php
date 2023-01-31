<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>


    <main class = "seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        <?php 
            $limite = 10;

            incluirTemplate('anuncios');
        ?>
    </main>
<?php 
    incluirTemplate('footer');
?>
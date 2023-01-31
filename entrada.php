<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>


    <main class = "contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type = "image/webp">
            <source srcset="build/img/destacada2.jpg" type = "image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>

        <p class = "informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span> </p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. Sed eget eros consequat, accumsan ipsum a, sodales nisi. Quisque feugiat in sem sit amet auctor.
                Aenean a mi vel sem convallis consectetur et ut orci. Morbi accumsan, neque faucibus suscipit tempus, diam nisl pellentesque lorem</p>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. Sed eget eros consequat, accumsan ipsum a, sodales nisi. Quisque feugiat in sem sit amet auctor.
                Aenean a mi vel sem convallis consectetur et ut orci. Morbi accumsan, neque faucibus suscipit tempus, diam nisl pellentesque lorem</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>
<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>



    <main class = "contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type = "image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. Sed eget eros consequat, accumsan ipsum a, sodales nisi. Quisque feugiat in sem sit amet auctor.
                     Aenean a mi vel sem convallis consectetur et ut orci. Morbi accumsan, neque faucibus suscipit tempus, diam nisl pellentesque lorem</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. Sed eget eros consequat, accumsan ipsum a, sodales nisi. Quisque feugiat in sem sit amet auctor.
                     Aenean a mi vel sem convallis consectetur et ut orci. Morbi accumsan, neque faucibus suscipit tempus, diam nisl pellentesque lorem</p>
            </div>
        </div>
    </main>
    <section class = "contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur nunc augue, quis mollis tellus cursus vel. Sed vulputate fringilla justo nec efficitur. Fusce pharetra nisl lacinia facilisis pretium. </p>
            </div>
        </div>
    </section>
<?php 
    incluirTemplate('footer');
?>
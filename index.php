<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header', $inicio = true);
?>

    <main class = "contenedor seccion">
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
    </main>
    <section class = "seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        <?php 
            $limite = 3;

            incluirTemplate('anuncios');
        ?>
        <div class="alinear-derecha">
            <a href="anuncios.html" class = "boton-verde">Ver todas</a>
        </div>
    </section>

    <section class = "imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.html" class = "boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class = "blog">
            <h3>Nuestro Blog</h3>

            <article class = "entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type = "image/webp">
                        <source srcset="build/img/blog1.jpg" type = "image/jpeg">
                        <img loading = "lazy" src = "build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span> </p>

                        <p>Consejos para construir una terraza el techo de tu casa con los mejor materiales y ahorrando dinero</p>
                    </a>
                </div>

            </article>

            <article class = "entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type = "image/webp">
                        <source srcset="build/img/blog2.jpg" type = "image/jpeg">
                        <img loading = "lazy" src = "build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span> </p>

                        <p>Maxiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>

            </article>
        </section>

        <section class = "testimoniales">
            <h2>Testimoniales</h2>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Carlos Gallegos</p>
            </div>
        </section>
    </div>
<?php 
    incluirTemplate('footer');
?>
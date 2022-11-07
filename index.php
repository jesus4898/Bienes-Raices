<?php 
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>


    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ut alias dolorem laboriosam perferendis sed, soluta itaque sint voluptatibus 
                dolore explicabo qui eaque rerum magnam hic delectus sit aliquid blanditiis voluptate!</p>
            </div>
            <div class="icono">
                <img src="/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ut alias dolorem laboriosam perferendis sed, soluta itaque sint voluptatibus 
                dolore explicabo qui eaque rerum magnam hic delectus sit aliquid blanditiis voluptate!</p>
            </div>
            <div class="icono">
                <img src="/img/icono3.svg" alt="icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ut alias dolorem laboriosam perferendis sed, soluta itaque sint voluptatibus 
                dolore explicabo qui eaque rerum magnam hic delectus sit aliquid blanditiis voluptate!</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y departamentos en Ventas</h2>

        <?php 

            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>


        <div class="alinear-derecha ver-todas">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario dejando tus datos</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="picture">
                    <img loading="lazy" src="/img/blog1.jpg" alt="blog1">
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>30/8/2022</span> por <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="picture">
                    <img loading="lazy" src="/img/blog2.jpg" alt="blog1">
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>30/8/2022</span> por <span>Admin</span></p>

                        <p>Maximiza el espacio de tu hogar</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="textimoniales">
            <h3>Testimonial</h3>
            <div class="testimonial">
                <blockquote>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Qui eaque quam, nisi quaerat, iusto consequatur
                    arum ea veniam inventore minus soluta quo ipsum expedita 
                    blanditiis quidem nihil nobis voluptatibus in.
                </blockquote>
                <p>-Jesus Abreu-</p>
            </div>
        </section>

    </div>

<?php 
    include 'includes/templates/footer.php';

?>

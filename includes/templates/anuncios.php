<?php 
    //importar la conexion

    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    //consultar

    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    //obtener los resultados

    $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">
        <picture>
            <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio1" loading="lazy">
        </picture>

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio"><?php echo $propiedad['precio']; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="/img/icono_wc.svg" alt="icono">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/img/icono_estacionamiento.svg" alt="estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="/img/icono_dormitorio.svg" alt="dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>

            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div> <!-- contenido anuncio-->
    </div> <!-- anuncio-->
    <?php endwhile; ?>
</div> <!-- contenedor de anucnio-->

<?php 
//cerrar la conexion
mysqli_close($db);
?>
<?php 

    $id= $_GET['id'];
    $id= filter_var($id, FILTER_VALIDATE_INT);


    
    if(!$id) {
        header('Location: /');
    }

    // //importar la conexion

    require 'includes/config/database.php';
    $db = conectarDB();

    // //consultar

    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    // //obtener los resultados

    $resultado = mysqli_query($db, $query);
    // var_dump($resultado->num_rows);
    // if(!$resultado->num_rows) {
    //     header('Location: /');
    // }
    //para saber si existe el id y rediceccionar en caso de que no
    $propiedad = mysqli_fetch_assoc($resultado);

    include 'includes/templates/header.php'
?>


    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        <picture>
            <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="logo" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>

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

            <?php echo $propiedad['descripcion']; ?>
        </div>
    </main>


<?php

    mysqli_close($db);
    include 'includes/templates/footer.php';
?>

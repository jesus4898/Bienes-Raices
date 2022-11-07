<?php 

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    // session_start();

    //var_dump($_SESSION);

    //$auth = $_SESSION['login'];
    if($auth) {
      header('Location: /');
    }

    //validar la URL por un id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }


    //base de datos

    require '../../includes/config/database.php';
    $db = conectarDB();

    //obtener los datos de la propiedad

    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);
    //var_dump($propiedad);
    //no se mezcla con las variables de abajo pq se asignan los resultados con el fetch assoc hacia propiedad


    //consulta para traer los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //var_dump($db);

    //arreglos con mensajes de errores
    $errores = [];

    //para que se traigan los datos del registro
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";


        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        

        $titulo = mysqli_real_escape_string(  $db, $_POST['titulo']);
        $precio = mysqli_real_escape_string(  $db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string(  $db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string( $db,  $_POST['habitaciones']);
        $wc = mysqli_real_escape_string( $db,  $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string(  $db, $_POST['estacionamiento']);
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //asignar files hacia una variable

        $imagen = $_FILES['imagen'];


        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = "Debes añadir un precio";
        }

        if( strlen($descripcion) < 10) {
            $errores[] = "Debes añadir un descripcion y debe tener al menos 1' caracteres";
        }

        if(!$habitaciones) {
            $errores[] = "Debes añadir un habitaciones";
        }

        if(!$wc) {
            $errores[] = "Debes añadir un baño";
        }

        if(!$estacionamiento) {
            $errores[] = "Debes añadir un estacionamiento";
        }

        if(!$vendedores_id) {
            $errores[] = "Debes añadir un vendedor";
        }
 
        // if(!$imagen['name'] || $imagen['error']) {
        //     $errores[] = 'La Imagen es Obligatoria';
        // }

        // //validar por tamaño de imagen 1mb max
        // $medida = 1000 * 100;

        // if($imagen['size'] > $media) {
        //     $errores[] = 'La Imagen es muy pesada';
        // }

        //echo "<pre>";
        //var_dump($errores);
        //echo "</pre>";

        //exit; esto es para ver los errores


        //revisar si el arreglo de errores esta vacio
        if(empty($errores)) {

            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            // /**Subida de archivos */
            //para borrar la imagen vieja
            if($imagen['name']) {
                // Eliminar la imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);
            //unlink para eliminar archivos
            //para que no se borre en caso de no subir nada
                $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen'];
            }

            // //Crear carpeta

            // $carpetaImagenes = '../../imagenes/';

            // if(!is_dir($carpetaImagenes)) {
            //     mkdir($carpetaImagenes);
            // }

            // //Generar un nombre unico para no reescribir

            // $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

            // //Subir la imagen

            // move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);



        // actualizar la base de datos


        $query = "UPDATE propiedades SET titulo = '${titulo}',  precio = ${precio}, imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones =${habitaciones},
        wc = ${wc}, estacionamiento = ${estacionamiento} , vendedores_id = ${vendedores_id} WHERE id = ${id}";

        // echo $query;

        // exit;

        $resultado = mysqli_query($db, $query);

        if($resultado) {
            //echo "Insertado Correctamente";
            //redireccionar al usuario y mostrar que la bd fue creda, el ? es un query string, para poner mas mensaje se coloca &registrado=1 por ejem

            header('Location: /admin?resultado=2');

            //solo funciona si no hay nada de html previo, se coloca al inicio
            }
        }



    }



    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

        <?php endforeach; ?>
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Nombre:</label>
                <input type="text" placeholder="Titulo propiedad" name="titulo" id="titulo" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" placeholder="precio" name="precio" id="precio" value="<?php echo $precio; ?>">

                <label for="imagen">Imagenes:</label>
                <input type="file"  id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

                <label for="descripcion">Descripcion</label>
                <textarea id=descripcion name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">habitaciones:</label>
                <input 
                type="number" 
                placeholder="ejm:3" 
                name="habitaciones" 
                id="habitaciones" 
                value="<?php echo $habitaciones; ?>"
                min=1 
                max=9>

                <label for="wc">baños:</label>
                <input type="number" placeholder="ejm:3" id="wc" name="wc" min=1 max=9 value="<?php echo $wc; ?>">

                <label for="estacionamiento">estacionamiento:</label>
                <input type="number" placeholder="ejm:3" id="estacionamiento" name="estacionamiento" min=1 max=9 value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option  value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                        <?php endwhile; ?>
                </select>

            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>


<?php 
    include '../../includes/templates/footer.php';
?>


<?php 
    include 'includes/templates/header.php'
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <img src="/img/destacada3.jpg" alt="logo" loading="lazy"> 
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend> Informacion Personal </legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">Correo Electronico</label>
                <input type="email" placeholder="Tu email" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Tu solicitud:</label>

                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Comprar">Comprar</option>
                    <option value="Alquilar">Alquilar</option>
                    <option value="Vender">Vender</option>
                </select>

                <label for="presupuesto">Rango de precio</label>
                <input type="number" placeholder="presupuesto" id="presupuesto">

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input  name="contacto" type="radio" vale="telefono" id="contactar-telefono">

                    <label for="contactar-email">Correo Electronico</label>
                    <input name="contacto" type="radio" vale="email" id="contactar-email">
                </div>

                <p>Si eligio telefono, indique la fecha y hora que estara disponible</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>
            
            <input type="submit" value="Enviar" class="boton-verde">
  
            

        </form>
    </main>


    
<?php 
    include 'includes/templates/footer.php';
?>

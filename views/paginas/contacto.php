

<main class="contenedor seccion">
        <h1>Contact</h1>

        <?php 
     if($mensaje){ ?>
      echo "<p class='alerta exito'> <?php echo $mensaje ?></p>"
      <?php }?>

        <div class="contenedor contenedor-contacto">
            <picture>
                <source srcset="build/img/destacada3.webp" type="imagen/webp">
                <source srcset="build/img/destacada3.jpg" type="imagen/jpg">
                <img src="build/img/destacada3.jpg" alt="imagen de la propiedad">
            </picture>
            <h2>Fill de Contact form</h2>

            <form  class="formulario" action="/contacto" method="POST">
                <fieldset>
                    <legend>Personal Information</legend>
                    <label for="name">Name</label>
                    <input type="text" placeholder="Your Name" id="nombre" name="contacto[nombre]" required>
                    
                   

                    <label for="mensaje">Message:</label>
                    <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
                </fieldset>
                <fieldset>
                    <legend>Information about the property</legend>
                    <label for="opciones">Buy or sell property</label>
                    <select id="opciones" name="contacto[tipo] required">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="Compra">Buy</option>
                        <option value="Vende">Sell</option>
                    </select>
                    <label for="presupuesto">Price</label>
                    <input type="number" placeholder="Your price" id="presupuesto" name="contacto[precio]" required>
                </fieldset>
                <fieldset>
                    <legend>Information about the properties</legend>

                    <p>How would you like to be contacted?</p>
                    <div class="forma-contacto">
                        <label for="contactar-telefono">Phone</label>
                        <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                        <label for="contactar-email">E-mail</label>
                        <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                    </div>
                    <div id="contacto">

                    </div>
          
                </fieldset>
                <input type="submit" value="Enviar" class=" boton boton-verde">
            </form>
        </div>
    </main>
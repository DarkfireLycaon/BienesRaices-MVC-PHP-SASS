<main class="contenedor seccion">
    <h1>Admin</h1>
    <?php 
    if($resultado){
         $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"> <?php echo s($mensaje) ?> </p>

   
   
    <?php  } } ?>

    <a href="propiedades/crear" class="boton boton-verde">New Property</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">New Seller</a>

    <h2>Settings</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> <!--  MOSTRAR resultados -->
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt=""></td>
                    <td><?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value= "propiedad">
                            <input type="submit" class="boton-rojo-block"  value="Delete"></a>
                        </form>
                        <a class="boton-verde-block"
                            href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    
    <h2>Sellers</h2>
    
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> <!--  MOSTRAR resultados -->
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" href="#" value="Delete"></a>
                        </form>
                        <a class="boton-verde-block"
                            href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
            </main>
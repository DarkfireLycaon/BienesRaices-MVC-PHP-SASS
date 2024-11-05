<main class="contenedor seccion">
        <h1>Update Seller</h1>
<?php foreach($errores as $error): ?>
    <div class="alerta error">
    <?php echo $error; ?>

    </div>
<?php endforeach;  ?>

        <a href="/admin" class="boton boton-verde">Back</a>
        <form class="formulario" method="POST" action="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" enctype="multipart/form-data">
        <?php include 'formulario.php' ?>
       
            <input type="submit" value="Save Changes" class="boton boton-verde">
        </form>
    </main>
<main class="contenedor seccion">
<h1>Update Propery</h1>
<?php foreach($errores as $error): ?>
    <div class="alerta error">
    <?php echo $error; ?>

    </div>
<?php endforeach;  ?>
<a href="/admin" class="boton boton-verde">Back</a>
<form class="formulario" method="POST" enctype="multipart/form-data">

<?php include 'formulario.php' ?>
<input type="submit" value="Update Property" class="boton boton-verde">

</form>

</main>

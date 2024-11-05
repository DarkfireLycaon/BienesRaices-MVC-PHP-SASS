<main class="contenedor seccion contenido-centrado">
        <h1>Login</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error"> 
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>
        <form method="POST" class="formulario" action="/login">
        <fieldset>
                    <legend>Email and Password</legend>
                    
                    <label for="email">Email</label>
                    <input type="email" placeholder="Your email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" placeholder="Your password" id="password" name="password" required>

                </fieldset>
                <input type="submit" value="iniciar sesion" class="boton boton-verde">
        </form>
    </main>
<main class="contenedor seccion">
        <h1><?php echo $propiedad->titulo; ?></h1>
        <div class="contenedor contenedor-destacada">
            <div class="destacada-imagen">
            
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" 
                alt="imagen de la propiedad">
            <p class="precio">$<?php echo $propiedad->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icoo estacionamiento" loading="lazy">
                    <p><?php echo $propiedad->Estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
                    </ul>
                    <p><?php echo $propiedad->descripcion; ?></p>
            </div>
            </div>
    </main>
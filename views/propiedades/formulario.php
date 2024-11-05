



<fieldset> 
                <legend>General Information</legend>
                <label for="titulo">Title:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Property Title" value="<?php echo s( $propiedad->titulo ); ?>">

                <label for="precio">Price</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Property Price" value="<?php echo s( $propiedad->precio ); ?>">

                <label for="imagen">Image:</label>
                <input type="file" id="imagen"
                 name="propiedad[imagen]" accept="image/jpeg, image/png">
                 <?php if($propiedad->imagen){ ?>
                    <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
                    <?php  } ?>
                <label for="descripcion">Description</label>
                <textarea name="propiedad[descripcion]" 
                id="descripcion"><?php echo s( $propiedad->descripcion ); ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>
                <Label for="habitaciones">Rooms</Label>
                <input type="number" 
                id="habitaciones" 
                name="propiedad[habitaciones]" 
                placeholder="Ej:3" 
                min="1" max="9" 
                value="<?php echo s( $propiedad->habitaciones ); ?>" >

                <Label for="wc">Baths</Label>
                <input type="number" 
                id="wc" 
                name="propiedad[wc]" 
                placeholder="Ej:3"
                 min="1" max="9" 
                 value="<?php echo s( $propiedad->wc ); ?>" >

                <Label for="Estacionamiento">Parking Lots</Label>
                <input type="number"
                 id="Estacionamiento" 
                 name="propiedad[Estacionamiento]"
                  placeholder="Ej:3" 
                  min="0" max="9"
                   value="<?php echo s( $propiedad->Estacionamiento ); ?>">

                  
            </fieldset>
            <fieldset>
                <legend>Seller</legend>
                <select name="propiedad[Vendedores_id]" id="nombre_vendedor">
                    <option value="">-- Select --</option>
               <?php foreach ($vendedores as $vendedor) {?>
                <option <?php echo $propiedad->id === $vendedor->id ? 'selected' : ''; ?> value=" <?php echo s($vendedor->id); ?>">
                    <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido);   ?></option>
                <?php }  ?>
                </select>
            </fieldset>
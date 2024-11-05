<fieldset> 
                <legend>Sign Seller</legend>
                <label for="name">Name</label>
                <input type="text" id="name" name="vendedor[nombre]"
                 placeholder="Seller's name" value="<?php echo s( $vendedor->nombre ); ?>">

                <label for="surname">Surname</label>
                <input type="text" id="surname" name="vendedor[apellido]"
                 placeholder="Seller's surname" value="<?php echo s( $vendedor->apellido ); ?>">

</fieldset> 

<fieldset>
    <legend>Extra Information</legend>

    <label for="phone">Phone number</label>
                <input type="number" id="phone" name="vendedor[telefono]"
                 placeholder="Seller's phone number" value="<?php echo s( $vendedor->telefono ); ?>">
                 
</fieldset>
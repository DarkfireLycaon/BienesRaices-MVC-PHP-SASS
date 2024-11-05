<?php
namespace Controllers;
use MVC\Router;

use Model\Vendedor;


class VendedorController{
    public static function crear(Router $router){

        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia de Propiedad con los datos del formulario
            $vendedor= new Vendedor($_POST['vendedor']);
    
        $errores = $vendedor->validar();
    
       if (empty($errores)) {
         // Guardar la propiedad en la base de datos
         $vendedor->guardar();
}
}
$router->render('vendedores/crear', [
    'errores' => $errores,
    'vendedor' => $vendedor
   ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
//obtener arreglo vendedor
$vendedor = Vendedor::find($id);
$vendedores = Vendedor::all();
//arreglo con mensaje de errores
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//asignar valores
$args = $_POST['vendedor'];
// sincronizar objeto en memoria con lo que el usuario escribio
$vendedor ->sincronizar($args);

//validacion
$errores = $vendedor -> validar();
$vendedor -> guardar();
}
$router -> render('/vendedores/actualizar', [
    'vendedor' => $vendedor,
    'errores' => $errores
    
]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
 
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
         
            // Comparar para saber que eliminar
            if ($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
    }
}
        }
    }
}
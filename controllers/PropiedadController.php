<?php 
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver; // Usamos ImageManagerStatic directamente

class PropiedadController{
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;
$router -> render('propiedades/admin', [
    'propiedades' => $propiedades,
    'resultado' => $resultado,
    'vendedores' => $vendedores
]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Ejecutar el código después de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una nueva instancia de Propiedad con los datos del formulario
    $propiedad = new Propiedad($_POST['propiedad']);

    // Generar nombre único para la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Verificar si se subió una imagen
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
        $propiedad->setImagen($nombreImagen);
    }
        
    // Validar la propiedad
    $errores = $propiedad->validar();

    // Revisar que el arreglo de errores esté vacío
    if (empty($errores)) {
        // Crear carpeta para imágenes si no existe
        if (!is_dir(CARPETAS_IMAGENES)) {
            mkdir(CARPETAS_IMAGENES);
        }

        // Guardar la imagen en el servidor si se procesó correctamente
        if (isset($image)) {
            $image->save(CARPETAS_IMAGENES . $nombreImagen);
        }

        // Guardar la propiedad en la base de datos
        $resultado = $propiedad->guardar();

        // Redirigir al usuario si se guardó correctamente
        if ($resultado) {
            header('Location: /admin?resultado=1');
            exit;
        }
    }
}
        

$router ->render('propiedades/crear', [
    'propiedad' => $propiedad,
    'vendedores' => $vendedores,
    'errores' => $errores
]);
    }
  
    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();


        $propiedad = Propiedad::find($id);
        //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    //validacion
    $errores = $propiedad->validar();

    // Generar nombre de la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // Asegúrate de que tiene extensión


    // Revisar que el arreglo de erores que este vacio
    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->resize(800, 600);
            $propiedad->setImagen($nombreImagen);

            $image->save(CARPETAS_IMAGENES . $nombreImagen);
        }
        $propiedad->guardar();
    }
}
        $router -> render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
            
        ]);
    }
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
 
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
         
            // Comparar para saber que eliminar
            if ($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
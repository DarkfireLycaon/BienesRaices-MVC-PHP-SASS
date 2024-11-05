<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer as PHPMailerPHPMailer;

class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = TRUE;
$router->render('paginas/index', [
    'propiedades'=>$propiedades,
     'inicio' => $inicio
]);
    }
    public static function nosotros(Router $router){
    $router->render('paginas/nosotros', [
     
    ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
          'propiedades'=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);
$router->render('paginas/propiedad', [
'propiedad' => $propiedad
]);
    }
    public static function blog(Router $router){
     $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
  $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){
        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];
      // crear instancia de php mailer  
      $phpmailer = new PHPMailerPHPMailer();
      // configurar smtp
     
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Username = 'abe8c22a82ead1';
$phpmailer->Password = '5e20317afaf48d';
$phpmailer->SMTPSecure = 'tls';
$phpmailer-> Port = 2525;
$phpmailer-> setFrom('admin@bienesraices.com');
$phpmailer-> addAddress('admin@bienesraices.com', 'BienesRaices.com');
$phpmailer-> Subject = 'Tienes un nuevo mensaje';
//habilitar html
$phpmailer-> isHTML(true);
$phpmailer-> CharSet = 'UTF-8';
//definir contenido
$contenido = '<html>';
$contenido .= '<p>You have a new message</p>';
$contenido .= '<p>Name:' . $respuestas['nombre'] .  '</p>';
$contenido .= '<p>Email:' . $respuestas['email'] .  '</p>';
//enviar de forma condicional algunos campos email o telefono
if($respuestas['contacto'] === 'telefono'){
    $contenido .= '<p>Eligio ser contactado por telefono <p>';
    $contenido .= '<p>Phone number:' . $respuestas['telefono'] .  '</p>';
    $contenido .= '<p>Date:' . $respuestas['fecha'] .  '</p>';
$contenido .= '<p>Time:' . $respuestas['hora'] .  '</p>';

} else{
    // es email entonces agregamos el contacto de email
    $contenido .= '<p>Eligio ser contactado por email <p>';
    $contenido .= '<p>Email: ' . $respuestas ['email'] . '</p>';
}
$contenido .= '<p>Message:' . $respuestas['mensaje'] .  '</p>';
$contenido .= '<p>Buy or sell:' . $respuestas['tipo'] .  '</p>';
$contenido .= '<p>Price: $' . $respuestas['precio'] .  '</p>';
$contenido .= '<p>You prefer to be contacted by:' . $respuestas['contacto'] .  '</p>';

$contenido .= '</html>';

$phpmailer-> Body = $contenido;
$phpmailer-> AltBody = 'Esto es texto alternativo sin html';

//enviar email
if($phpmailer -> send()){
    $mensaje = "Mensaje enviado correctamente";
} else {
    $mensaje = "Mensaje no enviado" . $phpmailer;
}
}

      $router->render('paginas/contacto', [
       'mensaje' => $mensaje
      ]);
    }
}
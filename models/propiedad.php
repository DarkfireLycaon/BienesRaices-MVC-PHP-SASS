<?php  
namespace Model;
class Propiedad extends ActiveRecord{
  protected static $tabla = 'propiedades';
  protected static $columnadb = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 
'habitaciones', 'wc', 'Estacionamiento', 'Creado', 'Vendedores_id'];

public $id;
public $titulo;
public $precio;
public $imagen;
public $descripcion;
public $habitaciones;
public $wc;
public $Estacionamiento;
public $Creado;
public $Vendedores_id;  

public function __construct($args = [])
{
  $this ->id = $args['id']?? null;
  $this ->titulo = $args['titulo']?? '';
  $this ->precio = $args['precio']?? '';
  $this ->imagen = $args['imagen']?? '';
  $this ->descripcion = $args['descripcion']?? '';
  $this ->habitaciones = $args['habitaciones']?? '';
  $this ->wc = $args['wc']?? '';
  $this ->Estacionamiento = $args['Estacionamiento']?? '';
  $this ->Creado = date('Y-m-d');
  $this ->Vendedores_id = $args['Vendedores_id']?? '';
}
public function validar(){
  
  if(!$this ->titulo){
    self::$errores[] = "You should add a title";
}
if(!$this ->precio){
  self::$errores[] = "The price is a MUST";
}
if(strlen($this ->descripcion) < 50){
  self::$errores[] = "You should add a description and at least 50 characters";
}
if(!$this ->habitaciones){
  self::$errores[] = "The number of room is a MUST";
}
if(!$this ->wc){
  self::$errores[] = "The number of wc is a MUST";
}
if(!$this ->Estacionamiento){
    self::$errores[] = "The number of parking loots is a MUST";
}
if(!$this ->Vendedores_id){
  self::$errores[] = "Choose a seller";
}
 
if(!$this ->imagen  ){
self::$errores[] = "The image is a MUST";
}

return self::$errores; }
}


?>

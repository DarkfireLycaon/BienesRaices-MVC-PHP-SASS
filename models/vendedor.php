<?php  
namespace Model;
class Vendedor extends ActiveRecord{
  protected static $tabla = 'vendedor';
  protected static $columnadb = ['id', 'nombre', 'apellido', 'telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  public function __construct($args = [])
{
  $this ->id = $args['id']?? null;
  $this ->nombre = $args['nombre']?? '';
  $this ->apellido = $args['apellido']?? '';
  $this ->telefono = $args['telefono']?? '';

}
public function validar(){
  
  if(!$this ->nombre){
    self::$errores[] = "The name is mandatory";
}
if(!$this ->apellido){
  self::$errores[] = "The surname is mandatory";
}
if(!$this ->telefono){
  self::$errores[] = "The the phone is mandatory";
}
if(!preg_match('/[0-9]{10}/', $this->telefono)){
  self::$errores[] = 'Phone Number Invalid Format';
}
return self::$errores;
} 
}
?>

<?php

namespace Model;

class ActiveRecord
{
  //base de datos
  protected static $db;
  protected static $columnadb = [];
  protected static $tabla = '';
  // errores o validacion
  protected static $errores = [];
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




  public function guardar()
  {
    if (!is_null($this->id)) {
      $this->actualizar();
    } else {
      $this->crear();
    }
  }
  public function actualizar()
  {
    $atributos = $this->sanitizar();
    $valores =  [];
    foreach ($atributos as $key => $value) {
      $valores[] = "$key = '$value'";
    }
    $query = " UPDATE ". static::$tabla ." SET ";
    $query .= join(', ', $valores);
    $query .= " WHERE id = '". self::$db->escape_string($this->id). "' ";
    $query .= " LIMIT 1 ";

    $resultado = self::$db->query($query);
    if ($resultado) {
      //redireccionar al usuario// 
      header('Location: /admin?resultado=1');
    }
    return $resultado;
  }
  public function crear()
  {
    //sanitizar el codigo
    $atributos = $this->sanitizar();

    //insertar en la base de datos
    $query = "INSERT INTO " . static::$tabla  .  " ( ";
    $query .= join(', ', array_keys($atributos));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($atributos));
    $query .= "') ";

    $resultado = self::$db->query($query);
    if ($resultado) {
      header('Location: /admin?resultado=1');
    }
  }
     // Eliminar un registro
     public function eliminar() {
      // Eliminar el registro
      $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
      $resultado = self::$db->query($query);

      if($resultado) {
          $this->borrarImagen();
          header('Location: /admin');
      }

      return $resultado;
  }
  public function atributos()
  {
    $atributos = [];
    foreach (static::$columnadb as $columna) {
      if ($columna === 'id') continue;
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }
  public function  sanitizar()
  {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      $sanitizado[$key] = self::$db->escape_string($value);
    }
    return $sanitizado;
  }
  public function setImagen($imagen)
  {
    //elimina imagen anterior
    if (!is_null($this->id)) {
      //comprobar si existe el archivo
      $this->borrarImagen();
    }
    //asignar al atributo imagen al nombre de la imagen
    if ($imagen) {
      $this->imagen = $imagen;
    }
  }
  public static function setDB($database)
  {
    self::$db = $database;
  }
  //Eliminar archivo
  public function borrarImagen()
  {
    $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);
    if ($existeArchivo) {
      unlink(CARPETAS_IMAGENES . $this->imagen);
    }
  }
  // validacion
  public static function getErrores()
  {
    return static::$errores;
  }
  //obtener numero limitado de registros
  public static function get($cantidad)
  {
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

    $resultado = self::consultarSQL($query);
    return $resultado;
  }

  // listar todas las propiedades
  public static function all()
  {
    $query = "SELECT * FROM " . static::$tabla;
    $resultado = self::consultarSQL($query);
    return $resultado;
  }
  public function validar()
  {
    static::$errores = [];
    return static::$errores;
  }
  //Busca un registro por su ID
  public static function find($id)
  {
    $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
    $resultado = self::consultarSQL($query);
    return array_shift($resultado);
  }

  public static function consultarSQL($query)
  {
    // consultar la base de datos
    $resultado = self::$db->query($query);
    //iterar los resultados
    $array = [];
    while ($registro = $resultado->fetch_assoc()) {
      $array[] = static::crearObjeto($registro);
    }

    // liberar la memoria
    $resultado->free();
    //retornar los resultados
    return $array;
  }
  protected static function crearObjeto($registro)
  {
    $objeto = new static;
    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }
    return $objeto;
  }
  public function sincronizar($args=[]) { 
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
}
}

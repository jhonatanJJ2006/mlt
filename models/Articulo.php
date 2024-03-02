<?php

namespace Model;

class Articulo extends ActiveRecord {

    protected static $tabla = 'articulos';
    protected static $columnasDB = ['id', 'nombre', 'fecha', 'imagen', 'descripcion'];

    public $id;
    public $nombre;
    public $fecha;
    public $imagen;
    public $descripcion;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre del Articulo es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error-admin'][] = 'La Imagen del Articulo es Obligatoria';
        }
        if(!$this->descripcion) {
            self::$alertas['error-admin'][] = 'La Descripción del Articulo es Obligatoria';
        }
        if(strlen($this->descripcion) < 30) {
            self::$alertas['error-admin'][] = 'La Descripción es muy Corta';
        }
        return self::$alertas;
    }
}
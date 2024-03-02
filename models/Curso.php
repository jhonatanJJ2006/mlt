<?php

namespace Model;

class Curso extends ActiveRecord {

    protected static $tabla = 'cursos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'imagen', 'duracion', 'ponente_id'];

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $imagen;
    public $duracion;
    public $ponente_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->duracion = $args['duracion'] ?? '';
        $this->ponente_id = $args['ponente_id'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error-admin'][] = 'La Descripción es Obligatoria';
        }
        if(!$this->precio) {
            self::$alertas['error-admin'][] = 'El Precio es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error-admin'][] = 'La Imagen es Obligatoria';
        }
        if(!$this->duracion) {
            self::$alertas['error-admin'][] = 'La Duración es Obligatoria';
        }
        if(!$this->ponente_id) {
            self::$alertas['error-admin'][] = 'Escoja un Ponente';
        }
        return self::$alertas;
    }
}
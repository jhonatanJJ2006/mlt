<?php

namespace Model;

class Revista extends ActiveRecord {

    protected static $tabla = 'revistas';
    protected static $columnasDB = ['id', 'nombre', 'pdf', 'imagen'];

    public $id;
    public $nombre;
    public $imagen;
    public $pdf;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->pdf = $args['pdf'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre es Obligatoria';
        }
        if(!$this->imagen) {
            self::$alertas['error-admin'][] = 'La Imagen de la Revista es Obligatoria';
        }
        if(!$this->pdf) {
            self::$alertas['error-admin'][] = 'El PDF es Obligatorio';
        }
        return self::$alertas;
    }
}
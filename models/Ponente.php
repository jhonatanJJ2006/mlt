<?php

namespace Model;

class Ponente extends ActiveRecord {
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'descripcion', 'imagen', 'tags', 'redes'];

    public $id;
    public $nombre;
    public $apellido;
    public $descripcion;
    public $imagen;
    public $tags;
    public $redes;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error-admin'][] = 'La Descripción es Obligatoria';
        }
        if(strlen($this->descripcion) < '100') {
            self::$alertas['error-admin'][] = 'La Descripción debe Contener Almenos 100 Caracteres';
        }
        if(!$this->imagen) {
            self::$alertas['error-admin'][] = 'La Imagen es Obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error-admin'][] = 'El Campo Áreas es Obligatorio';
        }
        return self::$alertas;
    }
}
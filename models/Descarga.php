<?php

namespace Model;

class Descarga extends ActiveRecord {

    protected static $tabla = 'descargas';
    protected static $columnasDB = ['id', 'usuario_id', 'documento_id', 'descargado'];

    public $id;
    public $usuario_id;
    public $documento_id;
    public $descargado;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->documento_id = $args['documento_id'] ?? '';
        $this->descargado = $args['descargado'] ?? 0;
    }
}
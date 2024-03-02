<?php

namespace Model;

class Compra extends ActiveRecord {

    protected static $tabla = 'compras';
    protected static $columnasDB = ['id', 'curso_id', 'usuario_id', 'confirmado'];

    public $id;
    public $curso_id;
    public $usuario_id;
    public $confirmado;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->curso_id = $args['curso_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }
}
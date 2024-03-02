<?php

namespace Model;

class Alerta extends ActiveRecord {

    protected static $tabla = 'alertas';
    protected static $columnasDB = ['id', 'nombre', 'curso_id', 'fecha', 'hora'];

    public $id;
    public $nombre;
    public $curso_id;
    public $fecha;
    public $hora;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->curso_id = $args['curso_id'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre es Obligatorio';
        }
        return self::$alertas;
    }
}
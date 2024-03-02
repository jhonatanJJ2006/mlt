<?php

namespace Model;

class Eventos extends ActiveRecord {

    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'nombre', 'url', 'curso_id', 'fecha', 'hora'];

    public $id;
    public $nombre;
    public $url;
    public $curso_id;
    public $fecha;
    public $hora;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->url = $args['url'] ?? '';
        $this->curso_id = $args['curso_id'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->url) {
            self::$alertas['error-admin'][] = 'El URL es Obligatorio';
        }
        if(!$this->fecha) {
            self::$alertas['error-admin'][] = 'La Fecha es Obligatorio';
        }
        if(!$this->hora) {
            self::$alertas['error-admin'][] = 'La Hora es Obligatorio';
        }
        return self::$alertas;
    }
}
<?php

namespace Model;

class Documento extends ActiveRecord {

    protected static $tabla = 'documentos';
    protected static $columnasDB = ['id', 'archivo', 'curso_id', 'fecha', 'hora', 'nombre'];

    public $id;
    public $archivo;
    public $curso_id;
    public $fecha;
    public $hora;
    public $nombre;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->archivo = $args['archivo'] ?? '';
        $this->curso_id = $args['curso_id'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar() {
        if(!$this->archivo) {
            self::$alertas['error-admin'][] = 'El Archivo es Obligatorio';
        }
        return self::$alertas;
    }
}
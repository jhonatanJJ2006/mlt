<?php

namespace Model;

class Medio extends ActiveRecord {

    protected static $tabla = 'medios';
    protected static $columnasDB = ['id', 'url'];

    public $id;
    public $url;
    public $video;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->url = $args['url'] ?? '';
        $this->video = $args['video'] ?? '';
    }

    public function validar() {
        if(!$this->url) {
            self::$alertas['error-admin'][] = 'La URL es Obligatoria';
        }
        if(strlen($this->url) < 10) {
            self::$alertas['error-admin'][] = 'La URL es muy Corta o no es Valida';
        }
        return self::$alertas;
    }
}
<?php 
namespace Models;

class Subtitulos extends ActivarModelo {
    protected static $tabla = 'subtitulos';
    protected static $columnaDB = ['id', 'subtitulo', 'contenido_id'];
    
    public $subtitulo;
    public $contenido_id;

    public function __construct($args = []) {
        $this->subtitulo = $args['subtitulo'] ?? null;
        $this->contenido_id = $args['contenido_id'] ?? null;
    }
}
?>

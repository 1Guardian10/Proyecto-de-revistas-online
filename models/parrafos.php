<?php 
namespace Models;

class Parrafos extends ActivarModelo {
    protected static $tabla = 'parrafos';
    protected static $columnaDB = ['id', 'parrafo', 'contenido_id'];
    
    public $parrafo;
    public $contenido_id;

    public function __construct($args = []) {
        $this->parrafo = $args['parrafo'] ?? null;
        $this->contenido_id = $args['contenido_id'] ?? null;
    }
}
?>

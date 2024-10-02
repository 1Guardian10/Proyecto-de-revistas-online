<?php 
namespace Models;
class Imagenes extends ActivarModelo {
    protected static $tabla = 'imagenes';
    protected static $columnaDB = ['id', 'imagen', 'contenido_id'];
    
    public $imagen;
    public $contenido_id;

    public function __construct($args = []) {
        $this->imagen = $args['imagen'] ?? null;
        $this->contenido_id = $args['contenido_id'] ?? null;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }  
}
?>

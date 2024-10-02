<?php 
namespace Models;
class contenidos extends ActivarModelo{
    protected static $tabla='contenido';
    protected static $columnaDB=['id','titulo','publicado','plantilla_id','username','descripcion'];
    public $titulo;
    public $username;
    public $plantilla_id;
    public $descripcion;

    public function __construct($args=[])
    {
        $this->titulo=$args['titulo']??null;
        $this->username=$args['username']??null;
        $this->plantilla_id=$args['plantilla_id']??null;
        $this->descripcion=$args['descripcion']??null;
    }

    public static function listarCont(){
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY publicado DESC";
        $resultado=self::$db->query($query);
        $contenido=[];
        if ($resultado){
            $contenido=$resultado->fetch_all(MYSQLI_ASSOC);
        }
        return $contenido;
    }
}
?>
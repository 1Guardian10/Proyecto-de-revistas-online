<?php
namespace Mvc;
class Router{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function __construct()
    {
        //echo 'Construyendo la ruta<br>';
    }

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn){
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas(){
        $urlActual=$_SERVER['PATH_INFO']??'/';
        $metodo=$_SERVER['REQUEST_METHOD'];
        if ($metodo=='GET'){
            $fn=$this->getRoutes[$urlActual]??null;
        }else{
            $fn=$this->postRoutes[$urlActual]??null;
        }
        if ($fn) call_user_func($fn,$this);
        else echo 'Pagina no encontrada';
    }

    public function renderLogin($ruta,$datos=[]){
        #ob_start();
        foreach ($datos as $key => $valor) {
            $$key=$valor;
        }
        include __DIR__."/views/$ruta.php";
        #$contenido=ob_get_clean();
        #include_once __DIR__."/views/layaout.php";
    }
    public function render($ruta,$datos=[]){
        ob_start();
        foreach ($datos as $key => $valor) {
            $$key=$valor;
        }
        include __DIR__."/views/$ruta.php";
        $contenido=ob_get_clean();
        include_once __DIR__."/views/nav.php";
    }
}
?>
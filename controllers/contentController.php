<?php
namespace Controllers;
use Mvc\Router;
use Models\contenidos;
use Models\Imagenes;
use Models\Parrafos;
use Models\Subtitulos;
session_start();
class contentController{
    public static function listar(Router $router){
        $contenidos=contenidos::listarCont();
        $router->render('content/listar',['contenidos'=>$contenidos]);
    }
    public static function listarMicont(Router $router){
        $contenidos=contenidos::listarCon('username',$_SESSION['user']);
        $router->render('content/listar2',['contenidos'=>$contenidos]);
    }
    public static function listarP(Router $router){
        $contenidos=contenidos::listar();
        $router->render('content/menu',['contenidos'=>$contenidos]);
    }
    public static function listarContenido(Router $router){
        $contenidos=contenidos::listarCon('username',$_SESSION['user']);
        $resultados = [];
        foreach ($contenidos as $contenido) {
            $id_contenido = $contenido['id']; // Suponiendo que 'id' es el campo de ID en tu tabla de contenidos
    
            // Obtener los párrafos, imágenes y subtítulos para este contenido
            $parrafos = Parrafos::listarCon('contenido_id', $id_contenido);
            $imagenes = Imagenes::listarCon('contenido_id', $id_contenido);
            $subtitulos = Subtitulos::listarCon('contenido_id', $id_contenido);
            $resultados[] = [
                'contenido' => $contenido,
                'parrafos' => $parrafos,
                'imagenes' => $imagenes,
                'subtitulos' => $subtitulos,
            ];
        }
        $router->render('content/listar2',['resultados'=>$resultados]);
    }
    public static function listarNoticia(Router $router){
        $id=$_GET['id'];
        $platilla=$_GET['t'];
        $contenidos=contenidos::listarCon('id',$id);
        $resultados = [];
        foreach ($contenidos as $contenido) {
            $id_contenido = $contenido['id']; // Suponiendo que 'id' es el campo de ID en tu tabla de contenidos
    
            // Obtener los párrafos, imágenes y subtítulos para este contenido
            $parrafos = Parrafos::listarCon('contenido_id', $id_contenido);
            $imagenes = Imagenes::listarCon('contenido_id', $id_contenido);
            $subtitulos = Subtitulos::listarCon('contenido_id', $id_contenido);
            $resultados[] = [
                'contenido' => $contenido,
                'parrafos' => $parrafos,
                'imagenes' => $imagenes,
                'subtitulos' => $subtitulos,
            ];
        }
        // echo '<pre>';
        // var_dump($contenidos);
        // echo '<\pre>';
        $router->render('template/template'.$platilla.$platilla,['resultados'=>$resultados]);
        
    }
    public static function editarNoticia(Router $router){
        $id=$_GET['id'];
        $platilla=$_GET['t'];
        $contenidos=contenidos::listarCon('id',$id);
        $resultados = [];
        foreach ($contenidos as $contenido) {
            $id_contenido = $contenido['id']; // Suponiendo que 'id' es el campo de ID en tu tabla de contenidos
    
            // Obtener los párrafos, imágenes y subtítulos para este contenido
            $parrafos = Parrafos::listarCon('contenido_id', $id_contenido);
            $imagenes = Imagenes::listarCon('contenido_id', $id_contenido);
            $subtitulos = Subtitulos::listarCon('contenido_id', $id_contenido);
            $resultados[] = [
                'contenido' => $contenido,
                'parrafos' => $parrafos,
                'imagenes' => $imagenes,
                'subtitulos' => $subtitulos,
            ];
        }
        // echo '<pre>';
        // var_dump($contenidos);
        // echo '<\pre>';
        $router->renderLogin('template/template'.$platilla,['resultados'=>$resultados]);
    }
    public static function Crear(Router $router) {
        $contenido=new contenidos();
        $imagenes= new Imagenes();
        $parrafos= new Parrafos();
        $subtitulos= new Subtitulos();
        $platilla = $_SESSION['valor'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contenido->titulo = $_POST['contenido']['titulo'];
            $contenido->username = $_SESSION['user'];
            $contenido->plantilla_id=$platilla;
            $contenido->descripcion=$_POST['contenido']['descripcion'];
            $idContenido=$contenido->crear();
            // Manejo de las imágenes
            if (isset($_FILES['contenido']['name']['imagen'])) {
                // Recorre las imágenes enviadas
                foreach ($_FILES['contenido']['name']['imagen'] as $key => $imagenNombre) {
                    $ubicacion = __DIR__ . "/../src/img/" . $imagenNombre;
    
                        // Mueve el archivo a la carpeta deseada
                        if (move_uploaded_file($_FILES['contenido']['tmp_name']['imagen'][$key], $ubicacion)) {
                            $imagenes->setImagen($imagenNombre);
                            $imagenes->contenido_id=$idContenido;
                            $imagenes->crear();
                        }
                }
            }
            if (isset($_POST['contenido']['parrafo'])) {
                
                $parrafo = $_POST['contenido']['parrafo'];
            
                // Itera sobre los subtítulos y párrafos
                foreach ($parrafo as $p) {
                    // Asigna los valores
                    $parrafos->parrafo = $p;
                    $parrafos->contenido_id = $idContenido;
                    // Inserta el párrafo y el subtítulo en la base de datos
                    $parrafos->crear();
                }
            }
            if (isset($_POST['contenido']['subtitulo']) ){
                $sub= $_POST['contenido']['subtitulo'];
                foreach ($sub as $s) {
                    $subtitulos->subtitulo = $s;
                    $subtitulos->contenido_id = $idContenido;
                    $subtitulos->crear();
                }
            }
            $router->renderLogin('template/template' . $platilla);
        } else {
            // Si no se envía el formulario, renderiza la vista sin contenido
            $router->renderLogin('template/template' . $platilla);
        }
    }    
    public static function Actualizar(Router $router) {
        $contenido = new Contenidos();
        $imagenes = new Imagenes();
        $parrafos = new Parrafos();
        $subtitulos = new Subtitulos();
        $plantilla = $_POST['t'];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Verifica si se ha proporcionado un ID de contenido
            $idContenido = $_POST['id'] ?? null;
            if ($idContenido) {
                // Asigna los valores del formulario al objeto $contenido
                $contenido->titulo = $_POST['contenido']['titulo'];
                $contenido->username = $_SESSION['user'];
                $contenido->plantilla_id = $plantilla;
                $contenido->descripcion = $_POST['contenido']['descripcion'];
                
                // Actualiza el contenido
                $contenido->actualizar($idContenido); // Método que debes implementar para actualizar
    
                // Manejo de las imágenes
                self::manejarImagenes($imagenes, $idContenido);
    
                // Manejo de los párrafos
                self::manejarParrafos($parrafos, $idContenido);
    
                // Manejo de los subtítulos
                self::manejarSubtitulos($subtitulos, $idContenido);
            }
    
            // Renderiza el template correspondiente
            $router->renderLogin('template/template' . $plantilla);
        } else {
            // Si no se envía el formulario, renderiza la vista sin contenido
            $router->renderLogin('template/template' . $plantilla);
        }
    }
    
    private static function manejarImagenes($imagenes, $idContenido) {
        if (isset($_FILES['contenido']['name']['imagen'])) {
            $parrafoIds = $_POST['contenido']['imagen_id'];
    
            // Recorre las imágenes enviadas
            foreach ($_FILES['contenido']['name']['imagen'] as $key => $imagenNombre) {
                $ubicacion = __DIR__ . "/../src/img/" . $imagenNombre;
    
                // Verifica si se ha subido un archivo
                if ($_FILES['contenido']['tmp_name']['imagen'][$key]) {
                    // Mueve el archivo a la carpeta deseada
                    if (move_uploaded_file($_FILES['contenido']['tmp_name']['imagen'][$key], $ubicacion)) {
                        // Comprueba si el ID de la imagen ya existe
                        if (!empty($parrafoIds[$key])) {
                            // Actualiza la imagen existente
                            $imagenes->setImagen($imagenNombre);
                            $imagenes->contenido_id=$idContenido;
                            $imagenes->actualizar($parrafoIds[$key]); // Método que debes implementar
                        }
                    }
                }
            }
        }
    }    
    
    private static function manejarParrafos($parrafos, $idContenido) {
        // Verifica si hay párrafos en el POST
        if (isset($_POST['contenido']['parrafo'])) {
            $parrafosArray = $_POST['contenido']['parrafo'];
            $parrafoIds = $_POST['contenido']['parrafo_id']; // Accede a los IDs de los párrafos
    
            // Itera sobre los párrafos
            foreach ($parrafosArray as $key => $p) {
                // Comprueba si hay un ID correspondiente para el párrafo
                if (isset($parrafoIds[$key])) {
                    // Actualiza el párrafo existente
                    $parrafos->parrafo = $p;
                    $parrafos->contenido_id = $idContenido;
                    $parrafos->actualizar($parrafoIds[$key]); // Utiliza el ID correcto aquí
                }
            }
        }
    }
    
    private static function manejarSubtitulos($subtitulos, $idContenido) {
        // Verifica si hay subtítulos en el POST
        if (isset($_POST['contenido']['subtitulo'])) {
            $subtitulosArray = $_POST['contenido']['subtitulo'];
            $subtituloIds = $_POST['contenido']['subtitulo_id']; // Accede a los IDs de los subtítulos
            // Itera sobre los subtítulos
            foreach ($subtitulosArray as $key => $s) {
                // Comprueba si hay un ID correspondiente para el subtítulo
                if (isset($subtituloIds[$key])) {
                    // Actualiza el subtítulo existente
                    $subtitulos->subtitulo = $s;
                    $subtitulos->contenido_id = $idContenido;
                    $subtitulos->actualizar($subtituloIds[$key]); // Utiliza el ID correcto aquí
                }
            }
        }
    }
    
}
?>
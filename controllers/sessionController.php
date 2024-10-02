<?php
namespace Controllers;
use Mvc\Router;
use Models\usuarios;
session_start();
class sessionController{
    public static function listar(Router $router){
        $usuarios=usuarios::listar();
        $router->render('propiedades/admin',['usuario'=>$usuarios]);
    }
    public static function Index(Router $router) {
        $usuario = new usuarios();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioData = $_POST['usuario'];
            $username = $usuarioData['username'];
            $pass = $usuarioData['password'];
            $resultado = $usuario->verificarUsuario($pass, $username);
            if ($resultado) {
                $_SESSION['user']=$username;
                $_SESSION['rol']=$resultado['role_id'];
                header('Location: /public/listarContenido');
                exit;
            } else {
                $router->renderLogin('Session/login', ['usuario' => $usuario, 'error' => 'Contraseña o nombre de usuario inválidos']);
            }
        } else {
            $router->renderLogin('Session/login', ['usuario' => $usuario]);
        }
    }
    
    public static function SigupUser(Router $router){
        $usuario=new usuarios();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if (isset($_POST['usuario']['password'])) {
                $_POST['usuario']['password'] = md5($_POST['usuario']['password']);
            }
            $usuario= new usuarios($_POST['usuario']);
            $resultado=$usuario->crear();
            if (!$resultado) {
                $_SESSION['user']=$_POST['usuario']['username'];
                $_SESSION['rol']=$_POST['usuario']['role_id'];
                header('Location: /public/listarContenido');
                exit;
            }
            else echo "No se inserto los datos";
        }else
            $router->renderLogin('Session/signup',['usuario'=>$usuario]);
    }
    
    public static function logOff(Router $router){
        session_destroy();
        $usuario=new usuarios();
        $router->renderLogin('Session/login', ['usuario' => $usuario]);
        exit;
    }
}
?>
<?php
require __DIR__.'/../includes/app.php';
use Mvc\Router;
use Controllers\sessionController;
use Controllers\contentController;
$router=new Router();
#$router->get('/admin',[adminController::Index()]); lista
$router->get('/login',[sessionController::class,'Index']);
$router->post('/loginv',[sessionController::class,'Index']);
$router->get('/signup',[sessionController::class,'SigupUser']);
$router->post('/signupf',[sessionController::class,'SigupUser']);
$router->get('/usuarios',[sessionController::class,'listar']);
$router->get('/cerrar',[sessionController::class,'logOff']);
$router->get('/listarContenido',[contentController::class,'listar']);
$router->post('/agregarContenido',[contentController::class,'Crear']);
$router->post('/editarContenido',[contentController::class,'Actualizar']);
$router->get('/Plantilla1',[contentController::class,'Crear']);
$router->get('/Plantilla2',[contentController::class,'Crear']);
$router->get('/Plantilla3',[contentController::class,'Crear']);
$router->get('/listarPlantillas',[contentController::class,'listarP']);
$router->post('/listarPlantillas',[contentController::class,'listarP']);
$router->get('/editar',[contentController::class,'editarNoticia']);
$router->get('/ver',[contentController::class,'listarNoticia']);
$router->get('/listarMicontenido',[contentController::class,'listarMicont']);
$router->comprobarRutas();
?>


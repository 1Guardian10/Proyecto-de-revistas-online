<?php
require __DIR__.'/../vendor/autoload.php';
use Models\ActivarModelo;
require 'db.php';
$db=conectar();
ActivarModelo::setDB($db);
?>
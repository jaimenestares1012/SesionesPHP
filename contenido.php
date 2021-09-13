<?php session_start();

if (isset($_SESSION['usuario'])) {
    require 'views/contenido.view.php';
    // code...
}else{
    header('Location:login.php');
}

 ?>
<?php
include_once __DIR__.'/../model/model_modificar_perfil.php';
include_once __DIR__.'/../model/connectaDB.php';

$connexio = connectaDB();


$id_usuario = $_SESSION['id_user']; 

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = modificarPerfil($connexio, $id_usuario); 
}

include __DIR__.'/../view/modificar_perfil.php';
?>

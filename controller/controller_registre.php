<?php
include_once __DIR__.'/../model/model_registre.php';
include_once __DIR__.'/../model/connectaDB.php';

$connexio = connectaDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registre = registreUsuari($connexio);
    if ($registre) {
        $message = "Registro exitoso.";
    } else {
        $message = "Error en el registro. Por favor, inténtalo de nuevo.";
    }
    header("Location: /index.php");
    
}

include __DIR__.'/../view/registre.php';
?>


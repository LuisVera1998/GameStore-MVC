<?php

include_once __DIR__.'/../model/model_iniciar_sessio.php';
include_once __DIR__.'/../model/connectaDB.php';

$connexio = connectaDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contrasenya = $_POST['password'];


    $id_user = iniciar_sessio($email, $contrasenya, $connexio);

    if ($id_user) {
        $_SESSION['id_user'] = $id_user;

        header("Location: /index.php"); 
        exit;
    } else {
        $error = "Correo electrónico o contraseña incorrectos.";
        include __DIR__.'/../view/iniciar_sessio.php';
    }
} else {
    include __DIR__.'/../view/iniciar_sessio.php';
}
?>

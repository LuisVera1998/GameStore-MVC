<?php 
    include_once __DIR__.'/../model/model_llistat_comandes.php';
    include_once __DIR__.'/../model/connectaDB.php';


    if (!isset($_SESSION['id_user'])) {
        header("Location: /recurs_login.php");
        exit;
    }

    $connexio = connectaDB();

    $id_usuario = $_SESSION['id_user'];

    $pedidos = recuperarComanda($connexio, $id_usuario);

    include __DIR__.'/../view/llistat_comandes.php';
?>

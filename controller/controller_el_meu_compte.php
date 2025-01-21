<?php 
    include_once __DIR__.'/../model/model_el_meu_compte.php';
    include_once __DIR__.'/../model/connectaDB.php';



    if (!isset($_SESSION['id_user'])) {
        header("Location: /recurs_login.php");
        exit;
    }

    $connexio = connectaDB();

    $idUsuari = $_SESSION['id_user'];

    $usuari = obtenirUsuari($connexio, $idUsuari);

    if (is_string($usuari)) {
        echo "<p>Error: $usuari</p>";
        exit;
    }

    include __DIR__.'/../view/el_meu_compte.php';
?>

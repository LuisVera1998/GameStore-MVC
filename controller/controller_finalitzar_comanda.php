<?php 
    include_once __DIR__.'/../model/model_finalitzar_comanda.php';
    include_once __DIR__.'/../model/model_carrito.php';
    include_once __DIR__.'/../model/connectaDB.php';


    echo '<script>';
    echo 'console.log("ID de usuario: ' . $_SESSION['id_user'] . '");';  //debug temporal
    echo '</script>';


    if (!isset($_SESSION['id_user'])) {
        header("Location: /recurs_login.php");
        exit;
    }

    $connexio = connectaDB();

    $carrito = getCarrito();

    $total = calcularTotal($carrito);

    guardarComanda($connexio, $carrito, $total);

    include __DIR__.'/../view/finalitzar_comanda.php';
?>

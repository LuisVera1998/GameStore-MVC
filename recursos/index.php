<?php
session_start();

$accio = $_GET['accio'] ?? NULL;

switch ($accio) {

    case 'les-meves-compres':
        include_once __DIR__."/recurs_llistat_comandes.php"; 
        break;

    case 'finalitzar-comanda':
        include_once __DIR__."/recurs_finalitzar_comanda.php"; 
        break;

    case 'carrito':
        include_once __DIR__."/recurs_carrito.php"; 
        break;

    case 'buidar-carrito':
        include_once __DIR__."/controller/controller_buidar_carrito.php"; 
        include_once __DIR__."/recurs_carrito.php"; 
        break;

    case 'registre':
        include __DIR__."/recurs_registre.php";  
        break;

    case 'iniciar-sessio':
        include __DIR__."/recurs_login.php";  
        break;

    case 'el-meu-compte':
        include_once __DIR__."/recurs_el_meu_compte.php"; 
        break;

    case 'modificar-cuenta':
        include_once __DIR__."/recurs_modificar_perfil.php"; 
        break;

    case 'tancar-sessio':
        include_once __DIR__."/controller/controller_tancar_sessio.php"; 
        break;
    
    default:
        include __DIR__."/recurs_home.php";
        break;
}
?>


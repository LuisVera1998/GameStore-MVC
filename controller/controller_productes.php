<?php
include_once __DIR__."/../model/model_productes.php"; 
include_once __DIR__.'/../model/connectaDB.php';

$connexio = connectaDB();

if (isset($_GET['id'])) { //productes a partir de categoria
    
    $id_categoria = $_GET['id'];
    $productes = getProductes($connexio, $id_categoria);
    
    if (empty($productes)) {
        echo '<p>No hay productos disponibles para esta categoría.</p>';
    } else {
        include_once __DIR__."/../view/productes.php"; 
    }
    
    exit();
} elseif (isset($_GET['id_producte'])) { //producte per id
 
    $id_producte = $_GET['id_producte'];
    $id_categoria = $_GET['id_categoria'];
    $producte = getDetalls($connexio, $id_producte, $id_categoria);

    if ($producte) {
        include __DIR__."/../view/descripcio_producte.php";
    } else {
        echo '<p>No se ha encontrado el producto.</p>';
    }
    exit();
} elseif (isset($_GET['nom'])) { //cerca per nom
   
    $nomProducte = $_GET['nom'];
    $productes = getProductesPerNom($connexio, $nomProducte);
    
    if (empty($productes)) {
        echo '<p>No hay productos disponibles que coincidan con este nombre.</p>';
    } else {
        include_once __DIR__."/../view/productes.php"; 
    }
    
    exit();

}


else {
    echo '<p>No hay opciones disponibles.</p>';
    exit();
}
?>

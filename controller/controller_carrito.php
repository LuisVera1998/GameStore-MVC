<?php

include_once __DIR__ . '/../model/model_carrito.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id'])) {

        $product_id = $_POST['id'];
        $quantity = (int) $_POST['quantity'];
        $preu = (float) $_POST['preu'];
        $product_nom = $_POST['product_nom'];


        agregarAlCarrito($product_id, $quantity, $preu, $product_nom);


        $carrito = getCarrito();


        $total = calcularTotal($carrito);
        $total_items = 0;
        foreach ($carrito as $producto) {
            $total_items += $producto['cantidad']; 
        }


        echo json_encode([
            'message' => 'Producto añadido correctamente.',
            'total_items' => $total_items, 
            'total_price' => $total
        ]);
    } elseif (isset($_POST['cantidad'])) {

        foreach ($_POST['cantidad'] as $id => $cantidad) {

            actualitzarQuantitat($id, (int)$cantidad);
        }


        $carrito = getCarrito();
        $total = calcularTotal($carrito);
        $total_items = 0;
        foreach ($carrito as $producto) {
            $total_items += $producto['cantidad']; 
        }

        header('Location: /../recurs_carrito.php');
        exit;

    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {

    $product_id = $_GET['id'];

    eliminarProducte($product_id);

    header('Location: /../recurs_carrito.php');
    exit;
}
else {


    $carrito = getCarrito();


    $total = calcularTotal($carrito);

    $total_items = 0;
    foreach ($carrito as $producto) {
        $total_items += $producto['cantidad'];
    }

    include __DIR__ . '/../view/carrito.php';
}
?>

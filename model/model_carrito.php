<?php
session_start();
function agregarAlCarrito($product_id, $cantidad, $preu, $product_nom) {

    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];
    } else {
        $carrito = [];
    }


    if (isset($carrito[$product_id])) {
        $carrito[$product_id]['cantidad'] += $cantidad;
    } else {

        $carrito[$product_id] = [
            'id' => $product_id,
            'nombre' => $product_nom,
            'cantidad' => $cantidad,
            'preuUnitari' => $preu 
        ];
    }

    $_SESSION['carrito'] = $carrito;
}

function buidarCarrito() {
    if (isset($_SESSION['carrito'])) {
        unset($_SESSION['carrito']);
    }
}

function getCarrito() {
    return $_SESSION['carrito'] ?? [];
}


function calcularTotal($carrito) {
    $total = 0;
    foreach ($carrito as $producto) {
        
        $precio = $producto['preuUnitari'];
        $total += $producto['cantidad'] * $precio;
    }
    return $total;
}

function actualitzarQuantitat($product_id, $cantidad) {
    if (isset($_SESSION['carrito'][$product_id])) {
        $_SESSION['carrito'][$product_id]['cantidad'] = $cantidad;
    }
}

function eliminarProducte($product_id) {
    if (isset($_SESSION['carrito'][$product_id])) {
        unset($_SESSION['carrito'][$product_id]);
    }
}

?>



<?php
function guardarComanda($connexio, $carrito, $total) {

    if (!isset($_SESSION['id_user'])) {
        echo "El usuario no ha iniciado sesión.";
        return false;
    }

    $usuari = $_SESSION['id_user'];
    $fecha = date("Y-m-d H:i:s");
    $cantidadTotal = 0;


    $detalles = [];
    foreach ($carrito as $producto) {
        $cantidadTotal += $producto['cantidad'];

        $detalles[] = [
            'id' => $producto['id'],
            'nombre' => $producto['nombre'],
            'cantidad' => $producto['cantidad'],
            'preuUnitari' => $producto['preuUnitari'],
            'subtotal' => $producto['cantidad'] * $producto['preuUnitari']
        ];
    }

    $detallesJSON = json_encode($detalles);


    $sql = "INSERT INTO pedidos (id_usuari, data, quantitat, preutotal, detalls) 
            VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($connexio, $sql, array($usuari, $fecha,  $cantidadTotal, $total, $detallesJSON));

    if ($result) {
        unset($_SESSION['carrito']);
        return true;
    } else {
        echo "Error al insertar el pedido.";
        return false;
    }
}











?>
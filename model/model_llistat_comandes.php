<?php
function recuperarComanda($connexio, $id_usuario) {

    if (!isset($id_usuario)) {
        echo "El usuario no ha iniciado sesión.";
        return false;
    }

    $sql = "SELECT id_pedido, data, quantitat, preutotal, detalls FROM pedidos WHERE id_usuari = $1";
    $result = pg_query_params($connexio, $sql, array($id_usuario));

    if ($result && pg_num_rows($result) > 0) {
        $pedidos = [];

        while ($comanda = pg_fetch_assoc($result)) {
            $pedidos[] = [
                'id' => $comanda['id_pedido'],
                'fecha' => $comanda['data'],
                'cantidad' => $comanda['quantitat'],
                'total' => $comanda['preutotal'],
                'detalles' => json_decode($comanda['detalls'], true)  
            ];
        }

        return $pedidos;
    } else {
        return "No se han encontrado pedidos.";
    }
}


?>
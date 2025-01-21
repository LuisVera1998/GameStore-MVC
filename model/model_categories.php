<?php

function getCategories($connexio) {

    $sql = "SELECT id, nom FROM categorias";

    $consulta = pg_query($connexio, $sql);

    $categories = pg_fetch_all($consulta);

    return $categories;
}

?>
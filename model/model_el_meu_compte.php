<?php
function obtenirUsuari($connexio, $id) {
    
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        return "El ID proporcionado no es válido.";
    }

    $sql = "SELECT id, nom, email, adreca, poblacio, codipostal, imagen FROM usuarios WHERE id = $1";
    $resultat = pg_query_params($connexio, $sql, array($id));

    if (!$resultat) {
        return "Hubo un error al recuperar los datos: " . pg_last_error($connexio);
    }

    $usuari = pg_fetch_assoc($resultat);

    if (!$usuari) {
        return "No se encontró un usuario con el ID proporcionado.";
    }

    return $usuari; 
}
?>

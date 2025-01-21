<?php

function iniciar_sessio($email, $contrasenya, $connexio) {
    
   
    $sql = "SELECT id, password FROM usuarios WHERE email = $1";

    $stmt = pg_prepare($connexio, "query_inici_sessio", $sql);
    $res = pg_execute($connexio, "query_inici_sessio", array($email));


    if ($res && pg_num_rows($res) > 0) {

        $usuari = pg_fetch_assoc($res);


        if (password_verify($contrasenya, $usuari['password'])) {
            return $usuari['id']; 
        }
    }

    return false; 
}
?>
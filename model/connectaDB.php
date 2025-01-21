<?php
    function connectaDB() {

        $servidor = "localhost";
        $port = "5432";
        //$DBnom = "Webg10";
        $DBnom = "tdiw-g10";
        $usuari = "tdiw-g10";
        $clau = "1q2w3e4r";
        
        $connexio = pg_connect("host=$servidor port=$port dbname=$DBnom user=$usuari
        password=$clau") or die("Error connexio DB");
    
        return ($connexio);
    }
?>

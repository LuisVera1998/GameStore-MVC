<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Videojuegos</title>
        <link rel="stylesheet" href="/css/estil_llistat_comandes.css"> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        <script src="js/script.js" defer></script> 
    </head>
    <body>

        <header class="header">
            <?php 
                include_once __DIR__.'/controller/controller_header.php'; 
            ?>
        </header>

    
        <?php 
            include_once __DIR__.'/controller/controller_llistat_comandes.php'; 
        ?>
      

        <div id="resum-carrito">
        <?php 
            include_once __DIR__.'/controller/controller_carrito_fixe.php'; 
        ?>
        
    </div>
    </body>
</html>

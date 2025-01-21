<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LightHaven</title>
    <link rel="stylesheet" href="css/estil_home.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="js/script.js" defer></script> 
</head>
<body>

    <header class="header">
        <?php 
            include_once __DIR__.'/controller/controller_header.php'; 
        ?>
    </header>


    <section class="categorias">
        <?php 
            include_once __DIR__.'/controller/controller_llistar_categories.php'; 
        ?>
    </section>

    <section class="productos">
        <div class="detall_producte" id="detall_producte">
            <!--  detalls -->
        </div>
        <div class="product-list" id="product-list">
            <!-- productes -->
        </div>
        
    </section>
    <div id="resum-carrito">
        <?php 
            include_once __DIR__.'/controller/controller_carrito_fixe.php'; 
        ?>
        
    </div>
    


</body>
</html>

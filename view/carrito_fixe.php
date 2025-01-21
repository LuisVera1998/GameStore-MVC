<p id="resum-carrito-text">
    <?php
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
            $totalItems = 0;
            $totalPrice = 0;
            foreach ($_SESSION['carrito'] as $producto) {
                $totalItems += $producto['cantidad'];
                $totalPrice += $producto['cantidad'] * $producto['preuUnitari'];
            }
            echo "Total productos: $totalItems | Total: €" . number_format($totalPrice, 2);
        } else {
            echo "Cesta vacía";
        }
    ?>
</p>
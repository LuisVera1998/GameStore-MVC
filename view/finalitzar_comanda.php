<section class="confirmacion-pedido">
    <h1>¡Gracias por tu compra!</h1>
    <p>Tu pedido ha sido procesado con éxito. A continuación, puedes revisar los detalles de tu compra.</p>
    
    <h2>Detalles del Pedido:</h2>
    <ul>
        <?php foreach ($carrito as $producto): ?>
            <li>
                <span class="producto-nombre"><?php echo htmlspecialchars($producto['nombre']); ?></span> - 
                <span class="producto-cantidad"><?php echo $producto['cantidad']; ?> x</span> 
                <span class="producto-preu"><?php echo number_format($producto['preuUnitari'], 2); ?> €</span>
            </li>
        <?php endforeach; ?>
    </ul>

    <p class="total"><strong>Total:</strong> <?php echo number_format($total, 2); ?> €</p>

    <a href="/index.php" class="boton volver">Volver a la tienda</a>
</section>

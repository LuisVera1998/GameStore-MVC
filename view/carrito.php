<?php if (empty($carrito)): ?>
    <div class="carrito-vacio">
        <p>Tu carrito está vacío.</p>
        <a href="index.php" class="carrito-btn2">Volver a la tienda</a>
    </div>
<?php else: ?>
    <div class="carrito-detalles">
        <form action="controller/controller_carrito.php" method="POST">
            <table class="carrito-tabla">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $producto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td>
                                <input type="number" name="cantidad[<?= $producto['id'] ?>]" value="<?= $producto['cantidad'] ?>" min="1">
                            </td>
                            <td><?php echo number_format($producto['preuUnitari'], 2, ',', '.'); ?> €</td>
                            <td><?php echo number_format($producto['preuUnitari'] * $producto['cantidad'], 2, ',', '.'); ?> €</td>
                            <td>
                                <a href="controller/controller_carrito.php?accion=eliminar&id=<?= $producto['id'] ?>" class="btn-eliminar">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="carrito-resumen">
                <p><strong>Total productos:</strong> <?php echo $total_items; ?></p>
                <p><strong>Total a pagar:</strong> <?php echo number_format($total, 2, ',', '.'); ?> €</p>
            </div>

            <button type="submit" class="carrito-btn">Actualizar carrito</button>
        </form>

        <a href="index.php?accio=finalitzar-comanda" class="carrito-btn">Finalizar compra</a>
        <a href="index.php?accio=buidar-carrito" class="carrito-btn">Vaciar carrito</a>
    </div>
<?php endif; ?>

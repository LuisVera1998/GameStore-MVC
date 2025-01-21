<div class="llistat-comandes">
    <?php if (is_array($pedidos)): ?>
        <h2>Mis Pedidos</h2>
        <?php foreach ($pedidos as $pedido): ?>
            <div>
                <h3>Pedido ID: <?= htmlspecialchars($pedido['id']) ?></h3>
                <p>Fecha: <?= htmlspecialchars($pedido['fecha']) ?></p>
                <p>Cantidad total: <?= htmlspecialchars($pedido['cantidad']) ?></p>
                <p>Total: <?= htmlspecialchars($pedido['total']) ?></p>
                <h4>Detalles:</h4>
                <ul>
                    <?php foreach ($pedido['detalles'] as $detalle): ?>
                        <li>Producto: <?= htmlspecialchars($detalle['nombre']) ?>, Cantidad: <?= htmlspecialchars($detalle['cantidad']) ?>, Precio unitario: <?= htmlspecialchars($detalle['preuUnitari']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><?= htmlspecialchars($pedidos) ?></p> 
    <?php endif; ?>
</div>
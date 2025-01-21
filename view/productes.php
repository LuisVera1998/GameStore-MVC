<?php foreach ($productes as $producte): ?>
    <div class="product-item">

        <img src="<?= htmlspecialchars($producte['imagen']) ?>" alt="<?= htmlspecialchars($producte['nom']) ?>">
        <h3><?= htmlspecialchars($producte['nom']) ?></h3>
        <p><strong>Precio: <?= htmlspecialchars($producte['precio']) ?>€</strong></p>
        <a href="#" onclick="detallProducte(<?= (int) $producte['id'] ?>, <?= (int) $producte['id_categoria'] ?>)"class="mas-detalles">Ver más detalles</a>


        <!-- carrito -->
        <form class="agregarCarritoForm">
            <label for="cantidad_<?= (int) $producte['id'] ?>">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad_<?= (int) $producte['id'] ?>" value="1" min="1" required>
            <input type="hidden" name="product_id" value="<?= (int) $producte['id'] ?>">
            <input type="hidden" name="preu" value="<?= htmlspecialchars($producte['precio']) ?>">
            <input type="hidden" name="product_nom" value="<?= htmlspecialchars($producte['nom']) ?>">
            <button type="submit" class="agregarCarritoButton" data-product-id="<?= (int) $producte['id'] ?>">Agregar al carrito</button>
        </form>
    </div>
<?php endforeach; ?>

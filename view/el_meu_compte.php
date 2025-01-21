<div class="el_meu_compte2">
    <h1>Mi Cuenta</h1>

    <div class="info-usuari">
        <p><strong>Nombre:</strong> <?= htmlspecialchars($usuari['nom']) ?></p>
        <p><strong>Correo Electrónico:</strong> <?= htmlspecialchars($usuari['email']) ?></p>
        <p><strong>Dirección:</strong> <?= htmlspecialchars($usuari['adreca']) ?></p>
        <p><strong>Ciudad:</strong> <?= htmlspecialchars($usuari['poblacio']) ?></p>
        <p><strong>Código Postal:</strong> <?= htmlspecialchars($usuari['codipostal']) ?></p>
    </div>
    <div class="imatge-usuari">
        <img src="<?= htmlspecialchars($usuari['imagen'] ?? '/img/avatar-por-defecto.png') ?>" 
            alt="Sin imagen de <?= htmlspecialchars($usuari['nom']) ?>">
    </div>

    <div class="boton-perfil">
        <a href="?accio=modificar-cuenta">Modificar mi Cuenta</a>
        <a href="/index.php">Volver al Inicio</a>
    </div>
</div>


<h1>REGISTRO DE USUARIO</h1>

<?php if (isset($message)): ?>
    <div class="message">
        <p><?= htmlspecialchars($message) ?></p>
    </div>
<?php endif; ?>

<form action="../controller/controller_registre.php" method="POST" id="formulari">
    <label for="nom">Nombre:</label>
    <input type="text" id="nom" name="nom" pattern="[a-zA-ZáéíóúÁÉÍÓÚàèòÀÈÒñÑ ]+" maxlength="30" required title="Solo se permiten letras y espacios.">

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required title="Introduce un correo válido.">

    <label for="pass">Contraseña:</label>
    <input type="password" id="contrasenya" name="contrasenya" pattern="[a-zA-Z0-9]+" required title="La contraseña debe ser de tipo alfanumérico.">

    <label for="address">Dirección:</label>
    <input type="text" id="adreca" name="adreca" maxlength="30" required>

    <label for="city">Ciudad:</label>
    <input type="text" id="poblacio" name="poblacio" maxlength="30" required>

    <label for="postal">Código Postal:</label>
    <input type="text" id="codipostal" name="codipostal" pattern="^\d{5}$" required title="El código postal debe ser de 5 dígitos.">

    <button type="submit" id=botoFormulari>Registrarse</button>
</form>

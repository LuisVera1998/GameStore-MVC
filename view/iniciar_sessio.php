<h1>INICIO DE SESIÓN</h1>

<form action="index.php?accio=iniciar-sessio" method="post" id="formulari">
    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" id ="botoFormulari">Inicia Sesión</button>
</form>

<?php if (isset($error)) : ?>
    <p style="color: red; text-align: center; margin: 10px">
        <?= htmlspecialchars($error) ?>
    </p>
<?php endif; ?>


<?php if (isset($message)): ?>
    <div class="message">
        <p><?= htmlspecialchars($message) ?></p>
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" id=formulari>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>
    
    <label for="email">Correu electrònic:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="contrasenya">Contrasenya:</label>
    <input type="password" id="contrasenya" name="contrasenya">
    
    <label for="adreca">Adreça:</label>
    <input type="text" id="adreca" name="adreca">
    
    <label for="poblacio">Població:</label>
    <input type="text" id="poblacio" name="poblacio">
    
    <label for="codipostal">Codi Postal:</label>
    <input type="text" id="codipostal" name="codipostal">
    
    <label for="perfil_imagen">Imatge de perfil:</label>
    <input type="file" name="imagen" accept="image/*">
    
    <button type="submit" id=botoFormulari>Modificar perfil</button>
</form>
<div class="logo">
    <h1><a href="/../index.php" style="text-decoration: none; color: inherit;">Light Haven</a></h1>
</div>

<div class="cerca">
    <div class="search-container">
        <input id="search-input" type="text" placeholder="Buscar productos...">
        <button onclick="buscarProducte()">Buscar</button>
    </div>

    <div class="ident">
        <?php if (isset($_SESSION['id_user'])): ?>
            <img id="userMenuButton" src="/../img/usuari.png" alt="Usuario" style="height: 50px; cursor: pointer;">
            <ul id="userMenu" style="display: none;">
                <li><a href="?accio=el-meu-compte">El meu compte</a></li>
                <li><a href="?accio=les-meves-compres">Les meves compres</a></li>
                <li><a href="?accio=tancar-sessio">Tancar sessió</a></li>
            </ul>
        <?php else: ?>
            <img id="userMenuButton" src="/../img/usuari.png" alt="Usuario" style="height: 50px; cursor: pointer;">
            <ul id="userMenu" style="display: none;">
                <li><a href="?accio=iniciar-sessio">Iniciar sesión</a></li>
                <li><a href="?accio=registre">Registro</a></li>
            </ul>
        <?php endif; ?>
        <div class="carrito-menu">
            <a href="?accio=carrito">
                <img src="/../img/carrito.png" alt="Cesta de la compra" style="height: 70px;">
            </a>
    </div>
</div>






<div class="categories-box">
    <?php foreach ($categories as $categoria): ?>
        <div class="category-item">
            <a href="#" data-id="<?php echo $categoria['id']; ?>" onclick="productes(<?php echo $categoria['id']; ?>)">
                <?php echo htmlentities($categoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php if (isset($product)): ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($product->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>"/>
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png"/>
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $product->descripcion ?></p>
            <p class="price">$<?= $product->precio ?></p>
            <?php if($product->stock == 0): ?>
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>" class="button button-red">No stock</a>
            <?php else: ?>
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Purchase</a>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <h1>The product does not exist.</h1>
<?php endif; ?>

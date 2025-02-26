<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Edit product <?=$pro->nombre?></h1>
    <?php $url_action = base_url."producto/save&id=".$pro->id; ?>
<?php else: ?>
    <h1>Create new product</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>
    
<div class="form_container">
    
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Name</label>
        <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" required/>

        <label for="descripcion">Description</label>
        <textarea name="descripcion" required><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

        <label for="precio">Price</label>
        <input type="number" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" required/>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" required/>

        <label for="categoria">Category</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria" required>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>
        
        <label for="imagen">Image</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb" />
        <?php endif; ?>
        <input type="file" name="imagen" />

        <input type="submit" value="Save"/>
        <a href="<?=base_url?>producto/gestion" class="button button-cancel">Cancel</a>
    </form>
</div>
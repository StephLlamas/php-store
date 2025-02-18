<?php if(isset($edit) && isset($cat) && is_object($cat)): ?>
    <h1>Edit category <?=$cat->nombre?></h1>
    <?php $url_action = base_url."categoria/save&id=".$cat->id; ?>
<?php else: ?>
    <h1>Create new category</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>

<form action="<?=$url_action?>" method="POST">
    <label for="nombre">Name</label>
    <input type="text" name="nombre" value="<?= isset($cat) && is_object($cat) ? $cat->nombre : ''; ?>" required/>
    
    <input type="submit" value="Save"/>
</form>
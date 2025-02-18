<h1>Manage categories</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
    Create category
</a>

<?php if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete'): ?>
    <strong class="alert-green">The category has been successfully created/updated.</strong>
<?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete'): ?>
    <strong class="alert-red">The category could not be created.</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>
    
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert-green">The category has been successfully deleted.</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert-red">The category could not be erased.</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>


<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
<?php while ($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
        <td>
            <a href="<?=base_url?>categoria/editar&id=<?=$cat->id?>" class="button button-gestion">Edit</a>
            <a href="<?=base_url?>categoria/eliminar&id=<?=$cat->id?>" class="button button-gestion button-red">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>
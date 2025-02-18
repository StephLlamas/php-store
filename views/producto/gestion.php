<h1>Manage products</h1>


<a href="<?=base_url?>producto/crear" class="button button-small">
    Create product
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert-green">The product has been successfully created.</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <strong class="alert-red">The product could not be created.</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>
    
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert-green">The product has been successfully deleted.</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert-red">The product could not be erased.</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
<?php while ($prod = $productos->fetch_object()): ?>
    <tr>
        <td><?=$prod->id;?></td>
        <td><?=$prod->nombre;?></td>
        <td><?=$prod->precio;?></td>
        <td><?=$prod->stock;?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Edit</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$prod->id?>" class="button button-gestion button-red">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>
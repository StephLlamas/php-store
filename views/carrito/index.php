<h1>Cart</h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Items</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($carrito as $indice => $elemento):
            $producto = $elemento['producto'];
            ?>

            <tr>
                <td>
                    <?php if ($producto->imagen != null): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/>
                    <?php else: ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?>
                </td>
                <td>
                    <?= $elemento['unidades'] ?>
                    <div class="updown">
                        <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>
                        <a href="<?=base_url?>carrito/up&index=<?=$indice?>&id=<?=$elemento['id_producto']?>" class="button">+</a>
                    </div>
                </td>
                <td>
                    <a href="<?= base_url ?>carrito/remove&index=<?=$indice?>" class="button button-carrito button-red">Remove</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    <br/>

    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">Empty cart</a>
    </div>

    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Total: $<?= $stats['total'] ?></h3>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Place order</a>
    </div>
<?php else: ?>
    <p>The cart is empty, please add a product.</p>
<?php endif; ?>
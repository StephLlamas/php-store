<h1>Order detail</h1>

<?php if (isset($pedido)): ?>
    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Change order status</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected' : '';?>>Pending</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : '';?>>In preparation</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected' : '';?>>Ready to ship</option>
                <option value="sended" <?=$pedido->estado == 'sended' ? 'selected' : '';?>>Sent</option>
            </select>
            <input type="submit" value="Change status" />
        </form>
        <br/>
    <?php endif; ?>
        
    <h3>User Data</h3>
    Name: <?= $pedido->nombre." ".$pedido->apellidos ?> <br/>
    E-mail: <?= $pedido->email ?> <br/>
    
    <h3>Shipping address</h3>
    City: <?= $pedido->provincia ?> <br/>
    State: <?= $pedido->localidad ?> <br/>
    Address: <?= $pedido->direccion ?> <br/>
    
    <h3>Order data</h3>
    Status: <?= Utils::showStatus($pedido->estado) ?><br/>
    Order id: <?= $pedido->id ?> <br/>
    Total: $<?= $pedido->coste ?> <br/>
    Products:

    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Items</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()): ?>
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
                    <?= $producto->unidades ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

<?php endif; ?>
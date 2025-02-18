<?php if (isset($gestion)): ?>
    <h1>Manage orders</h1>
<?php else: ?>
    <h1>My orders</h1>
<?php endif; ?>

<table>
    <tr>
        <th>Order id</th>
        <th>Total</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    <?php while ($ped = $pedidos->fetch_object()): ?>

        <tr>
            <td>
                <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
            </td>
            <td>
                $<?= $ped->coste ?>
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
                <?= Utils::showStatus($ped->estado) ?>
            </td>
        </tr>

    <?php endwhile; ?>
</table>

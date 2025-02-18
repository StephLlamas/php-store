<?php if (isset($_SESSION['identity'])): ?>
    <h1>Place order</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Back to cart</a>
    </p>
    <br/>
    <h3>Shipping address</h3>
    <form action="<?=base_url.'pedido/add'?>" method="POST">
        <label for="provincia">City</label>
        <input type="text" name="provincia" required />
        
        <label for="localidad">State</label>
        <input type="text" name="localidad" required />
        
        <label for="direccion">Address</label>
        <input type="text" name="direccion" required />
        
        <input type="submit" value="Confirmar pedido" />
    </form>
        
<?php else: ?>
    <h1>Login</h1>
    <p>You must be logged in to continue with the order.</p>
<?php endif; ?>

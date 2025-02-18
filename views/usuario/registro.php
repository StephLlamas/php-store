<h1>Register</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert-green">Registration completed correctly.</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert-red">Registration failed.</strong>
<?php endif; ?> 
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Name:</label>
    <input type="text" name="nombre" required/>
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
    
    <label for="apellidos">Surname:</label>
    <input type="text" name="apellidos" required/>
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required/>
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'email') : ''; ?>
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'email_unico') : ''; ?>

    <label for="password">Password:</label>
    <input type="password" name="password" required/>

    <input type="submit" value="Register"/>
</form>
<?php Utils::deleteSession('errores'); ?>

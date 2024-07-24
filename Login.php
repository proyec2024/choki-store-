<link rel="stylesheet" href="<?php echo RUTA_PRINCIAL; ?>css/normalize.css">
<link rel="stylesheet" href="<?php echo RUTA_PRINCIAL; ?>css/FormAuth.css">
<div class="contenedor-formulario contenedor">
    <div class="imagen-formulario">

    </div>
    <form action="<?php echo RUTA_PRINCIAL; ?>Actions/codeLogin.php" method="POST" class="formulario">
        <div class="texto-formulario">
            <h2>Bienvenido</h2>
            <p>Inicia sesión con tu cuenta</p>
        </div>
        <div class="input">
            <label for="usuario">E-mail</label>
            <input placeholder="Ingresa tu nombre" name="email" type="text" id="usuario">
        </div>
        <div class="input">
            <label for="contraseña">Contraseña</label>
            <input placeholder="Ingresa tu contraseña" name="password" type="password" id="contraseña">
        </div>
        <div class="password-olvidada">
            <a href="<?php echo RUTA_PRINCIAL; ?>?pages=singup">Crear cuenta</a>
        </div>
        <div class="input">
            <input type="submit" value="Iniciar Sesion">
        </div>
    </form>
</div>
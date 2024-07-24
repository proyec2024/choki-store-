<link rel="stylesheet" href="<?php echo RUTA_PRINCIAL; ?>css/normalize.css">
<link rel="stylesheet" href="<?php echo RUTA_PRINCIAL; ?>css/FormAuth.css">
<div class="contenedor-formulario contenedor">
    <div class="imagen-formulario">

    </div>
    <form action="<?php echo RUTA_PRINCIAL; ?>Actions/codeSingup.php" method="POST" class="formulario">
        <div class="texto-formulario">
            <h2>Registro</h2>
        </div>
        <div class="input">
            <label for="nombre">Nombre</label>
            <input placeholder="Ingresa tu nombre" name="nombre" type="text" id="usuario">
        </div>
        <div class="input">
            <label for="apellido">Apellido</label>
            <input placeholder="Ingresa tu apellido" name="apellido" type="text" id="contraseña">
        </div>
        <div class="input">
            <label for="E-mail">E-mail</label>
            <input placeholder="Ingresa tu E-mail" name="email" type="text" id="usuario">
        </div>
        <div class="input">
            <label for="contraseña">Contraseña</label>
            <input placeholder="Ingresa tu contraseña" name="password" type="password" id="contraseña">
        </div>
        <div class="input">
            <input type="submit" value="Iniciar Sesion">
        </div>
    </form>
</div>
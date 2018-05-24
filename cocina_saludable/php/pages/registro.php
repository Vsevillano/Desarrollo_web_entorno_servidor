<?php
    require_once('php/clases/Usuario.php');

    if(isset($_SESSION['login'])) {
        header('Location: index.php?page=inicio');
    }

    if(isset($_POST['registrar'])) {
        $var = Usuario::singleton_usuario();
        $var->registraUsuario($_POST['nombre'], $_POST['email'], $_POST['usuario'], $_POST['password']);
    }

?>
	<div class="contenido">
        <h2>Registro de usuarios</h2>
        <div class="formulario">
            <form action="index.php?page=registro" method="post">
                <fieldset>
                    <legend>Registro</legend>
                    <label for="nombre">Nombre</label><br><br>
                    <input type="text" name="nombre" id="nombre"><br><br>
                    <label for="email">Email</label><br><br>
                    <input type="email" name="email" id="email"><br><br>
                    <label for="usuario">Usuario</label><br><br>
                    <input type="text" name="usuario" id="usuario"><br><br>
                    <label for="password">Contraseña</label><br><br>
                    <input type="password" name="password" id="password"><br><br>
                    <label for="password">Repetir Contraseña</label><br><br>
                    <input type="password" name="password" id="password"><br><br>
                    <input type="submit" name="registrar" value="Registrar"><br><br>
                </fieldset>
            </form>
        </div>
    </div>
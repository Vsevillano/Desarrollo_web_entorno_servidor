<?php 

    require_once('php/clases/Login.php');

    if(isset($_SESSION['login'])) {
        header('Location: index.php?page=inicio');
    }

    if(isset($_POST['login'])){
        $var = Login::singleton_login();
        $perfil = $var->loginUsuario($_POST['usuario'], $_POST['password']);
        
        switch ($perfil['Perfil']) {
            case 'admin':
                $_SESSION['login'] = $perfil;
                header('Location: index.php?page=inicio');
                break;
            case 'usuario':
                $_SESSION['login'] = $perfil;
                header('Location: index.php?page=inicio');
            break;
            default:
                header('Location: index.php?page=login');
            break;
        }
	}
?>

	<div class="contenido">
        <h2>Login de usuarios</h2>
        <div class="formulario">
            <form action="index.php?page=login" method="post">
                <fieldset>
                    <legend>Login</legend>
                    <label for="usuario">Usuario</label><br><br>
                    <input type="text" name="usuario" id="usuario"><br><br>
                    <label for="password">Contraseña</label><br><br>
                    <input type="password" name="password" id="password"><br><br>
                    <input type="submit" name="login" value="Login"><br><br>
                </fieldset>
            </form>
        </div>
    </div>


<?php 

    require_once('php/clases/Login.php');

    if(isset($_SESSION['login'])) {
        header('Location: index.php?page=inicio');
    }

    $error = '';

    if(isset($_POST['login'])){
        $var = Login::singleton_login();
        $perfil = $var->loginUsuario($_POST['usuario'], $_POST['password'], $_POST['perfil']);
        
        switch ($perfil['Perfil']) {
            case 'Admin':
                $_SESSION['login'] = $perfil;
                header('Location: index.php?page=inicio');
                break;
            case 'User':
                $_SESSION['login'] = $perfil;
                header('Location: index.php?page=inicio');
            break;
            case 'Collaborator':
                $_SESSION['login'] = $perfil;
                header('Location: index.php?page=inicio');
            break;
            default:
                $error = "Usuario o contraseña incorrecta";
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
                    <label for="perfil">Perfil</label>
                    <select name="perfil" id="perfil">
                        <option value="User">Usuario</option>
                        <option value="Admin">Administrador</option>
                        <option value="Collaborator">Colaborador</option>
                    </select>
                    <br><br>
                    <input type="submit" name="login" value="Login"><br><br>
                    <?php
                        if($error != '') {
                            echo "<span style=color:red>".$error."<span>";
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </div>


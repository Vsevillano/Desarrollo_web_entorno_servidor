<?php
    require_once('php/clases/Usuario.php');

    if($_SESSION['login']['Perfil'] != 'Admin') {
        header('Location: index.php');
    }


    if(isset($_POST['validar'])) {
        $var = Usuario::singleton_usuario();
        $var->validarUsuarios($_POST['casillaValidar']);
    }

?>

    <div class="contenido">
        <h2>Gestión de usuarios</h2>
        <div id="formulario">
            <?php
                $var = Usuario::singleton_usuario();
                $usuarios = $var->getUsuariosBloqueados();
            ?>
            <h2>Usuarios no validados</h2>
            <form action="index.php?page=validar" method="post">
                <fieldset>
                    <legend>Validación de usuarios</legend>
                    <?php
                    foreach ($usuarios as $key) {
                        echo "<label for=id>Usuario: <label>";
                        echo "<input type='text' name='noValidado' value='$key[usuario]' disabled>";
                        echo "<input type='checkbox' name='casillaValidar[]' value='$key[id]'></br></br>";
                    }      
                    echo "<br/>";
              
                    ?>
                    <input type="submit" name="validar" value="Validar">
                    <input type="submit" name="cancelar" value="Cancelar">
                </fieldset>
            </form>
        </div>
    </div>

<?php
    require_once('php/clases/Usuario.php');

    if($_SESSION['login']['Perfil'] != 'admin') {
        header('Location: index.php');
    }

    if(isset($_POST['cancelar'])) {
        header('Location: index.php?page=inicio');
    }

    if(isset($_POST['validar'])) {
        $var = Usuario::singleton_usuario();
        $var->validarUsuarios($_POST['casillaValidar']);
    }

    if(isset($_POST['actualizar'])) {
        $var = Usuario::singleton_usuario();
        $var->update_usuario($_POST['id'],$_POST['nombre'],$_POST['email'], $_POST['usuario']);
        
    }

    if(isset($_GET['user'])) {
        $var = Usuario::singleton_usuario();
        $var->delete_usuario($_GET['user']);      
    }
?>

    <div class="contenido">
        <h2>Gestión de usuarios</h2>
        <?php
        if(!isset($_GET['modificar'])) {
        ?>
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
                        echo "<input type='submit' name='desmarcar' value='Desmarcar'><input type='submit' name='marcarTodos' value='Marcar(Todos)'><br><br>";

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
        
        <div class="formulario">
            <h2>Listado de Usuarios</h2>
            <form action="index.php?page=validar" method="post">
                <fieldset>
                    <legend>Listado de usuarios</legend>
                    <?php
                    $usuarios = $var->get_usuarios();

                    foreach ($usuarios as $key) {
                        echo "<label for=id>Usuario: <label>";
                        echo "<input type='text' name='noValidado' value='$key[usuario]' disabled>";
                        echo "<a href=index.php?page=validar&modificar=$key[id]>Modificar</a>";
                        echo "<a href=index.php?page=validar&user=$key[id]>Eliminar</a>";
                        echo "<br/><br/>";
                    }      
                    echo "<br/><br/>";
                    ?>

                </fieldset>
            </form>
        </div>
        <?php
        } else {
        ?>
        <div class="formulario">
        <?php
            $var = Usuario::singleton_usuario();
            $usuario = $var->get_usuario($_GET['modificar']);
        ?>
            <form action="index.php?page=validar" method="post">
                <fieldset>
                    <legend>Registro</legend>
                    <label for="id">Id</label><br><br>
                    <input type="text" name="id" id="id" value="<?php echo $usuario['id'] ?>"><br><br>
                    <label for="nombre">Nombre</label><br><br>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre'] ?>"><br><br>
                    <label for="email">Email</label><br><br>
                    <input type="email" name="email" id="email"value="<?php echo $usuario['email'] ?>"><br><br>
                    <label for="usuario">Usuario</label><br><br>
                    <input type="text" name="usuario" id="usuario"value="<?php echo $usuario['usuario'] ?>"><br><br>
                    <input type="submit" name="actualizar" value="Actualizar"><br><br>
                </fieldset>
            </form>
        </div>
        <?php
        }
        ?>
    </div>

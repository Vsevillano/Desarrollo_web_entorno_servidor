<?php
    if(isset($_SESSION['login'])) {

    if($_SESSION['login']['Perfil'] == 'admin') {
?>

        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=validar">Usuarios</a></li>
                <li><a href="index.php?page=claves">Claves</a></li>
                <li><a href="index.php?page=logout">Log out</a></li>
            </ul>
        </nav>

<?php
    }

    if($_SESSION['login']['Perfil'] == 'usuario') {
?>
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=documentos">Documentos</a></li>
                <li><a href="index.php?page=subir">Subir</a></li>
                <li><a href="index.php?page=logout">Log out</a></li>
            </ul>
            <p>Bienvenido <a href="index.php?page=perfil"><?php echo $_SESSION['login']['Usuario'];?></a></p>

        </nav>

<?php
    }
    } else {

        ?>
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=login">Login</a></li>
            </ul>
            <p>¿No tienes cuenta? <a href="index.php?page=registro">Registrar</a></p>

        </nav>
        <?php
    }
?>
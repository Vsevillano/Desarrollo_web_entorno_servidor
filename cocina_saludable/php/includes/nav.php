<?php
// Si esta la sesion activa
if(isset($_SESSION['login'])) {
    // Si el perfil es admin
    if($_SESSION['login']['Perfil'] == 'Admin') {
        
        ?> 
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=recetas">Recetas</a></li>
                <li><a href="index.php?page=validar">Gestion</a></li>
                <li><a href="index.php?page=pagos">Pagos</a></li>
                <li><a href="index.php?page=logout">Log out</a></li>
            </ul>
            <p>Bienvenido, <a href="index.php?page=perfil"><?php echo $_SESSION['login']['Usuario'];?></a><br>( <?php echo $_SESSION['login']['Perfil']; ?> )</p>
        </nav>

        <?php
    }

    // Si el perfil es colaborador
    if($_SESSION['login']['Perfil'] == 'Collaborator') {
        ?>
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=recetas">Recetas</a></li>
                <li><a href="index.php?page=misRecetas">Mis Recetas</a></li>
                <li><a href="index.php?page=publicacion">Pubicación</a></li>
                <li><a href="index.php?page=logout">Log out</a></li>
            </ul>
            <p>Bienvenido, <a href="index.php?page=perfil"><?php echo $_SESSION['login']['Usuario'];?></a><br>( <?php echo $_SESSION['login']['Perfil']; ?> )</p>        
        </nav>
        
        <?php
    }
    
    // Si el perfil es usuario
    if($_SESSION['login']['Perfil'] == 'User') {
        ?>
        <nav>
            <ul>
                <li><a href="index.php?page=inicio">Inicio</a></li>
                <li><a href="index.php?page=recetas">Recetas</a></li>
                <li><a href="index.php?page=recomendaciones">Recomendaciones</a></li>
                <li><a href="index.php?page=favoritas">Favoritas</a></li>
                <li><a href="index.php?page=logout">Log out</a></li>
            </ul>
            <p>Bienvenido, <a href="index.php?page=perfil"><?php echo $_SESSION['login']['Usuario'];?></a><br>( <?php echo $_SESSION['login']['Perfil']; ?> )</p>
        </nav>
        
        <?php
    }

// Si no hay sesion activa    
} else {
    
    ?>
    <nav>
        <ul>
            <li><a href="index.php?page=inicio">Inicio</a></li>
            <li><a href="index.php?page=recetas">Recetas</a></li>
            <li><a href="index.php?page=login">Login</a></li>
        </ul>
        <p>¿No tienes cuenta? <a href="index.php?page=registro">Registrar</a></p>

    </nav>
    <?php
}
?>
<?php
    require_once('php/clases/Usuario.php');

    if($_SESSION['login']['Perfil'] != 'admin') {
        header('Location: index.php');
    }

    if(isset($_GET['clave'])){
        $var = Usuario::singleton_usuario();
        $usuarios = $var->generaClaveFirmas($_GET['clave']);
    }
    

?>

<div class="contenido">
    <h2>Claves de firma de Usuarios</h2>
    <div id="formulario">
        <form action="index.php?page=claves" method="post">
            <fieldset>
                <legend>Buscar</legend>
                <label for="usuario">Usuario</label>
                <input type="text" name="busqueda" id="buscar">
                <input type="submit" name="buscar" value="Buscar">
            </fieldset>
        </form>
    </div>

    <?php
    if(isset($_POST['buscar'])) {
        $var = Usuario::singleton_usuario();
        $usuarios = $var->get_usuarios($_POST['busqueda']);

    ?>
    <div class="contenido">
        <div id="formulario">
    <?php       
        echo "<h2>Usuarios: </h2>";
        foreach ($usuarios as $key) {
        echo "<p>Usuario: ".$key['usuario']." ";
        
        $nombre_fichero = "upload/dir".$key['id']."/cf".$key['id'];
        
        if(!file_exists($nombre_fichero)) {
            echo "<a href='index.php?page=claves&clave=$key[id]'> Generar</a></p>";
        } 
        else {
            echo "<a href='$nombre_fichero'> Descargar</a></p>";
        } 
    }
}
else {
    $var = Usuario::singleton_usuario();
    $usuarios = $var->get_usuarios();

?>
<div class="contenido">
    <div id="formulario">
<?php       
    echo "<h2>Usuarios: </h2>";
    foreach ($usuarios as $key) {
    echo "<p>Usuario: ".$key['usuario']." ";
    
    $nombre_fichero = "upload/dir".$key['id']."/cf".$key['id'];
    
    if(!file_exists($nombre_fichero)) {
        echo "<a href='index.php?page=claves&clave=$key[id]'> Generar</a></p>";
    } 
    else {
        echo "<a href='$nombre_fichero'> Descargar</a></p>";
    } 
}
}
    ?>
    </div>
    </div>

</div>
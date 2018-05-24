<?php
require_once('php/clases/Receta.php');

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
}

if($_SESSION['login']['Perfil'] != 'User') {
    header('Location: index.php');
}

if (isset($_POST['quitarFavorita'])) {
    $var = Receta::singleton_receta();
    $recetas = $var->deleteFavorita($_SESSION['login']['id'], $_POST['idReceta'] );
}

?>

<div class="contenido">
    <h2>Recetas favoritas de <?php echo $_SESSION['login']['Usuario']; ?> </h2>
    <div class="formulario">
        <?php
            $var = Receta::singleton_receta();
            $recetas = $var->getFavoritas($_SESSION['login']['id']);
            if (!empty($recetas)){
                foreach ($recetas as $key) {
                    echo "<form action='index.php?page=favoritas' method='post'>";
                    echo "<div id='receta'>";
                    echo "<h2>Receta de ".$key['titulo']."</h2>";
                    echo "<h2>Ingredientes</h2>";
                    echo "<div id='imagen'>";
                    echo "<img src='upload/dir$key[idColaborador]/$key[imagen]'>";
                    echo "</div>";
                    echo "<p>".$key['ingredientes']."</p>";
                    echo "<h2>Elaboración</h2>";
                    echo "<p>".$key['elaboracion']."</p>";
                    echo "<h2>Etiquetas: </h2><p>".$key['etiquetas']."</p>";
                    echo "<input type='hidden' name='idReceta' value='$key[id]'>";
                    echo "<input type='submit' name='quitarFavorita' value='Quitar de favoritas'>";
                    echo "<br/><br/>";
                    echo "</div>";
                    echo "</form>";
                    echo "<hr>";
                }  
            } 
            else {          
                echo "<h2>Aun no tienes recetas favoritas.</h2>";
            }
        ?>     
    </div>
</div>
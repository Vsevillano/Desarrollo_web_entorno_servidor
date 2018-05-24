<?php
require_once('php/clases/Colaborador.php');

if(isset($_POST['ocultar'])) {
    $var = Colaborador::singleton_colaborador();
    $recetas = $var->oculta_receta($_POST['idReceta'], $_SESSION['login']['id']);
}

if(isset($_POST['visualizar'])) {
    $var = Colaborador::singleton_colaborador();
    $recetas = $var->mostrar_receta($_POST['idReceta'], $_SESSION['login']['id']);
}
?>

<div class="contenido">
    <h2>Recetas publicadas por <?php echo $_SESSION['login']['Usuario']; ?> </h2>
    <div class="formulario">
        <h2>Buscador de receta</h2>
        <div class="formulario">
            <form action="index.php?page=misRecetas" method="post">
            <fieldset>
            <legend>Buscar</legend>
                <label for="receta">Receta</label>
                <input type="text" name="busqueda" id="buscar">
                <input type="submit" name="buscar" value="Buscar">
            </fieldset>
            </form>
        </div>

        <?php
            
            $var = Colaborador::singleton_colaborador();
            $recetas = $var->get_recetas($_SESSION['login']['id']);
            
            foreach ($recetas as $key) {
                echo "<form action='index.php?page=misRecetas' method='post'>";
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
                if(isset($_SESSION['login'])) {
                    if($_SESSION['login']['Perfil'] == 'Collaborator') {
                        if($key['idColaborador'] == $_SESSION['login']['id']) {
                            echo "<input type='submit' name='borrar' value='Borrar'>";
                            echo "<input type='submit' name='modificar' value='Modificar'>";
                            if ($key['publica'] == '0') {
                                echo "<input type='submit' name='visualizar' value='Visualizar'>";
                            }
                            else  {
                                echo "<input type='submit' name='ocultar' value='Ocultar'>";
                            }
                        }
                    }
                }
                echo "</form>";
                echo "</div>";
                echo "<br/><br/>";
                echo "<hr>";
                }      
    
        ?>
    </div>
</div>
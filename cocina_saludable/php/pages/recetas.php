<?php
require_once('php/clases/Receta.php');
require_once('php/clases/Colaborador.php');


if(isset($_POST['favorita'])) {
    $var = Receta::singleton_receta();
    $recetas = $var->recetaFavorita($_SESSION['login']['id'], $_POST['idReceta'] );
}

if(isset($_POST['ocultar'])) {
    $var = Colaborador::singleton_colaborador();
    $recetas = $var->oculta_receta($_POST['idReceta'], $_SESSION['login']['id']);
}

if(isset($_POST['visualizar'])) {
    $var = Colaborador::singleton_colaborador();
    $recetas = $var->mostrar_receta($_POST['idReceta'], $_SESSION['login']['id']);
}

if(isset($_POST['votar'])) {
    $var = Receta::singleton_receta();
    $recetas = $var->votar_receta($_SESSION['login']['id'], $_POST['idReceta'], $_POST['puntuacion'] );
}
?>

<div class="contenido">
    <h2>Recetas publicadas por los colaboradores</h2>
    <div class="formulario">
        <h2>Buscador de receta</h2>
        <div class="formulario">
            <form action="index.php?page=recetas" method="post">
            <fieldset>
            <legend>Buscar</legend>
                <label for="receta">Receta</label>
                <input type="text" name="busqueda" id="buscar">
                <input type="submit" name="buscar" value="Buscar">
            </fieldset>
            </form>
        </div>

        <?php
        if(isset($_POST['buscar'])) {
            $var = Receta::singleton_receta();
            $recetas = $var->get_recetas($_POST['busqueda']);

            foreach ($recetas as $key) {
                echo "<form action='index.php?page=recetas' method='post'>";
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
                    echo "<select name='puntuacion' id='puntuacion'>";
                        echo "<option value='1'>1</option>";
                        echo "<option value='2'>2</option>";
                        echo "<option value='3'>3</option>";
                        echo "<option value='4'>4</option>";
                        echo "<option value='5'>5</option>";
                    echo "</select>";
                    echo "<input type='submit' name='votar' value='Votar'>";
                    echo "<input type='submit' name='favorita' value='Favorita'>";
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

        } else {
            
            $var = Receta::singleton_receta();
            $recetas = $var->get_recetas();
            
            foreach ($recetas as $key) {
                echo "<form action='index.php?page=recetas' method='post'>";
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
                    $var = Receta::singleton_receta();
                    $votacion = $var->get_votacion($_SESSION['login']['id'], $key['id']);
                    if(empty($votacion)) {
                        echo "<select name='puntuacion' id='puntuacion'>";
                            echo "<option value='1'>1</option>";
                            echo "<option value='2'>2</option>";
                            echo "<option value='3'>3</option>";
                            echo "<option value='4'>4</option>";
                            echo "<option value='5'>5</option>";
                        echo "</select>";
                        echo "<input type='submit' name='votar' value='Votar'>";
                    }
                    else {
                        echo "<p> Tu votacion para esta receta: ".$votacion[0]['puntuacion'];
                    }
                    echo "<br/><br/>";
                    echo "<input type='submit' name='favorita' value='Favorita'>";
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
        }      
        ?>
    </div>
</div>
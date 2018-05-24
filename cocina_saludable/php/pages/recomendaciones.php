<?php
require_once('php/clases/Receta.php');

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
}

if (isset($_POST['recomendar'])) {
    $var = Receta::singleton_receta();
    $recetas = $var->get_recomendacion();
        foreach ($recetas as $key) {
            $var->recetaFavorita($_SESSION['login']['id'], $key['id']);
        }
}

?>


<div class="contenido">
    <h2>Recomendaciones</h2>
    <div class="formulario">
            <form action="index.php?page=recomendaciones" method="post">
                <input type="submit" name="recomendar" value="Recomendar">
            </form>

    </div>
</div>
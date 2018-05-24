<?php

require_once('php/clases/Documentos.php');

if($_SESSION['login']['Perfil'] != 'usuario') {
    header('Location: index.php');
}


?>


<div class="contenido">
        <h2>Documentos de <?php echo $_SESSION['login']['Usuario']?></h2>
        <div id="formulario">
            <?php
                $var = Documentos::singleton_documentos();
                $documentos = $var->getDocuments($_SESSION['login']['id']);
                
                echo "<table>";
                echo "<tr><td> Documento </td><td> Estado </td><td> Fecha </td><td> Accion </td></tr>";
                foreach ($documentos as $key) {
                    echo "<tr><td>". $key['fichero'] ."</td><td>". $key['estado'] ."</td><td>". $key['fechaFirma'] ."</td>";
                    if($key['estado'] == 'Pendiente')
                        echo "<td><a href='index.php?page=validarFirma&fichero=".$key['id']."'> Firmar </a></td></tr>";
                    else
                        echo "</tr>";
                }      
                echo "</table>";
            ?>
        </div>
</div>
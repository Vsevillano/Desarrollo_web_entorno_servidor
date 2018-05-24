<?php
    require_once('php/clases/Colaborador.php');

    if($_SESSION['login']['Perfil'] != 'Collaborator') {
        header('Location: index.php?page=inicio');
    }

    if(isset($_POST['publicar'])) {
        $rutaUp = "upload/dir".$_SESSION['login']['id']."/".date('Y').date('d').date('m').date('H').date('i').date('s').strtr($_FILES['archivo']['name']," ", "-");
        $var = Colaborador::singleton_colaborador();
        $var->insertaReceta($_POST['titulo'],$_POST['ingredientes'],$_POST['elaboracion'], $_POST['etiquetas'], date('Y').date('d').date('m').date('H').date('i').date('s').strtr($_FILES['archivo']['name']," ", "-"), $_SESSION['login']['id']);

        if(file_exists($rutaUp)){
		    echo $_FILES['archivo']['name']. " ya existe. ";
		  }else{
		    move_uploaded_file($_FILES['archivo']['tmp_name'],$rutaUp);
            //$_FILES['archivo']['name'] = $rutaUp;
            
          }    
    }

?>
	<div class="contenido">
        <h2>Publicacion de recetas</h2>
        <div class="formulario">
        <form  action="index.php?page=publicacion" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Publicación</legend>
                    <label for="titulo">Titulo</label><br><br>
                    <input type="text" name="titulo" id="titulo"><br><br>
                    <label for="ingredientes">Ingredientes</label><br><br>
                    <textarea name="ingredientes" id="ingredientes" cols="70" rows="5"></textarea><br><br>
                    <label for="elaboracion">Elaboracion</label><br><br>
                    <textarea name="elaboracion" id="elaboracion" cols="70" rows="5"></textarea><br><br>
                    <label for="etiquetas">Etiquetas</label><br><br>
                    <textarea name="etiquetas" id="etiquetas" cols="70" rows="5"></textarea><br><br>
                    <label for="imagen">Imagen</label><br><br>
                    <input type="file" name="archivo" value="Subir archivo" required/>
                    <br><br>
                    <input type="submit" name="publicar" value="Publicar"><br><br>
                </fieldset>
            </form>
        </div>
    </div>
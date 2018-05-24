<?php 

    require_once('php/clases/Documentos.php');

    if($_SESSION['login']['Perfil'] != 'usuario') {
        header('Location: index.php');
    }

    if(isset($_POST['subir'])){
        if(file_exists("upload/dir".$_SESSION['login']['id']."/".date('Y').date('d').date('m').date('H').date('i').date('s').strtr($_FILES['archivo']['name']," ", "-"))){
		    echo $_FILES['archivo']['name']. " ya existe. ";
		  }else{
		    $rutaUp = "upload/dir".$_SESSION['login']['id']."/".date('Y').date('d').date('m').date('H').date('i').date('s').strtr($_FILES['archivo']['name']," ", "-");
		    move_uploaded_file($_FILES['archivo']['tmp_name'],$rutaUp);
            $_FILES['archivo']['name'] = $rutaUp;
            
            $var = Documentos::singleton_documentos();
            $var->subirArchivo($_SESSION['login']['id'], $_FILES['archivo']['name'], $_POST['descripcion']);
		  }
    }
?>

<div class="contenido">
        <h2>Subida de archivos</h2>
        <div class="formulario">
            <form  action="index.php?page=subir" method="post" enctype='multipart/form-data'>
				<fieldset>
                <legend>Subida de archivos</legend>
                <label for="descripcion">Descripcion</label>
                <br/><br/>
				<textarea class="buscar" type="search" pattern="\w{2}" name="descripcion" placeholder="Descripcion" rows="5" cols="50"/></textarea>
				<br/><br/>
				<input type="file" name="archivo" value="Subir archivo" required/>
				<br/><br/>
				<input type="submit" name="subir" value="Subir" >
                </fieldset>
			</form>
        </div>
    </div>
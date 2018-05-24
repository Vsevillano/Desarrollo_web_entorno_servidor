<?php 
	require_once('php/clases/Documentos.php');

	/* Control de acceso */
	if($_SESSION['login']['Perfil'] != 'usuario'){
		header("location: index.php");
	}

    if(isset($_POST['firmar'])) {
        $var = Documentos::singleton_documentos();
        $documentos = $var->validarFirma($_SESSION['login']['id'],$_POST['fichero'], $_POST['fila'], $_POST['columna'], $_POST['numero']);
    }

    
	/* Comprueba si el fichero a firmar es del usuario */
    /* Si el fichero se ha firmado, vuelve al indice */
	if(isset($_GET['fichero'])){
        $var = Documentos::singleton_documentos();
        if(count($var->comprobarFicheroFirmado($_SESSION['login']['id'], $_GET['fichero'])) == 1) {
            header("location: index.php?page=documentos");
        }
        if(count($var->comprobarFicheroFirmar($_SESSION['login']['id'], $_GET['fichero'])) == 0) {
            header("location: index.php?page=documentos");
        }
	}

	$fila = rand(0,7);
	$columna = rand(0,7);
?>

<div class="contenido">
	<h2>Firmar</h2>
		<div class="formulario">
            <form action='index.php?page=validarFirma' method="POST">
				<fieldset>
                <legend>Firmar documento</legend>
                <h3>Fila = <?php echo $fila ?>  / Columna = <?php echo $columna ?></h3>
                    <input type="hidden" name="fichero" value="<?php echo $_GET['fichero'] ?>">
                    <input type="hidden" name="fila" value="<?php echo $fila ?>">
                    <input type="hidden" name="columna" value="<?php echo $columna ?>">
                    <input type="number" name="numero" />
                    <input type="submit" name="firmar" value="Firmar" />
                </fieldset>
			</form>

			<br/>
			<a href="index.php?page=documentos">Volver atrás</a>
		</div>
</div>

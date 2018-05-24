<?php
    require_once('php/clases/Admin.php');


    if($_SESSION['login']['Perfil'] != 'Admin') {
        header('Location: index.php');
    }


    // Asignamos fecha a todos los proyectos
    if (isset($_POST['cambiar_fecha'])) {
        $fechas = $_POST['fechaPresentacion'];
        $horas = $_POST['horaPresentacion'];
        $id = $_POST['idProyecto'];

        foreach ($fechas as $key => $value) {
            $var = Admin::singleton_admin();
            $var->asignar_fecha($id[$key], $value, $horas[$key]);
            //print_r($id[$key]."  ///  ".$value."  ///  ".$horas[$key]."<br>");
        }
        header('Location: index.php?page=gestion');
    }

?>
	<div class="contenido">
		<div class="info">  
        <h2>Gestión de convocatorias</h2>
            <?php
            $var = Admin::singleton_admin();
            $proyectos = $var->get_proyectos_convocatoria($_POST['idConvocatoria']);

            echo "<form action='index.php?page=asignarFecha' method='post'>";
            foreach ($proyectos as $key) {
                echo "<div class='proyecto'>";
                echo "<input type='hidden' name='idProyecto[]' value='$key[proyecto_id]'><br><br>";
                echo "<h2>Titulo: ".$key['titulo']."</h2>";
                echo "<label for='fechaPresentacion'>Fecha de presentacion</label>";
                echo "<input type='date' name='fechaPresentacion[]' value='".$key['fechaPresentacion']."'></br></br>";
                echo "<label for='horaPresentacion'>Hora de presentacion</label>";
                echo "<input type='time' name='horaPresentacion[]' value='".$key['horaPresentacion']."'></br></br>";

                echo "</div>";

            }
            echo "<input type='submit' name='cambiar_fecha' value='Asignar hora'>";
            echo "</form>";

            ?>
        </div>
    </div>

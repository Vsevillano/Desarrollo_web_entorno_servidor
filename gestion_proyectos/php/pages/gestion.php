<?php
    require_once('php/clases/Convocatoria.php');
    require_once('php/clases/Admin.php');
	require_once('php/clases/config.php');

    $error = '';

    if($_SESSION['login']['Perfil'] != 'Admin') {
        header('Location: index.php');
    }

    // Si se hace clic en crear convocatoria
    if(isset($_POST['insertConvocatoria'])) {
        $var = Convocatoria::singleton_convocatoria();
        $convocatoria = $_POST['anoConvocatoria']."-".$_POST['mesConvocatoria'];

        if (empty($var->get_convocatoria_nombre($convocatoria))) {
            $var->insertar_convocatoria($convocatoria);
        }
        else {
            header('Location: index.php?page=inicio&error=4');
        }
    }

    // Si se hace clic en cambiar estado convocatoria
    if (isset($_POST['cambiar_estado_convocatoria'])) {
        $var = Convocatoria::singleton_convocatoria();
        if ($_POST['estado'] == 'Actual') {
        if(count($var->comprobar_estado_convocatoria()) == 0) {
            $var->actualizar_convocatoria($_POST['idConvocatoria'], $_POST['estado']);
        }
        else {
            header('Location: index.php?page=inicio&error=5');
        }
        }
        else {
            $var->actualizar_convocatoria($_POST['idConvocatoria'], $_POST['estado']);

        }
    }

    // Si se hace clic en alargar fecha
    if(isset($_POST['alargarFecha'])) {
        $var = Convocatoria::singleton_convocatoria();
        $tiempo = TIEMPO_EXTRA;
        $var->alargar_fecha_proyecto($_POST['idProyecto'], $tiempo);

    }

    /* Muestra el formulario con las posibes convocatorias*/
    function mostrarFormulario() {

        $anoConvocatoria = (date('Y')-1)."/".date('Y');

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mesActual = $meses[date('n')-1];

        echo "<form action='index.php?page=gestion' method='post'>";
                switch ($mesActual) {
                    case 'Enero':
                    case 'Febrero':
                    case 'Marzo':
                        echo "<input type='text' name='mesConvocatoria' value='Marzo'></br>";
                    break;
                    case 'Abril':
                    case 'Mayo':
                    case 'Junio':
                        echo "<input type='text' name='mesConvocatoria' value='Junio'></br>";
                    break;
                    default:
                        echo "<input type='text' name='mesConvocatoria' value='Diciembre'></br>";
                    break;
                }
                echo "<br/><br/>";
                echo "<input type='text' name='anoConvocatoria' value=$anoConvocatoria>";
                echo "<br/><br/>";
                echo "<input type='submit' name='insertConvocatoria' value='Crear'>";
                echo "</form>";
    }

?>
	<div class="contenido">
		<div class="info">  
        <h2>Gestión de convocatorias</h2>
            <?php
            $var = Convocatoria::singleton_convocatoria();
            $convocatorias = $var->get_convocatorias();

            foreach ($convocatorias as $key ) {
                if ($key['estado'] == 'Actual')  {
                    echo "<div class='presentaciones'>";
                    echo "<h2>Convocatoria actual: ".$key['convocatoria']."</h2>";

                    $var = Admin::singleton_admin();
                    $proyectos = $var->get_proyectos_convocatoria($key['id']);
                    
                    echo "<h3>Proyectos registrados en esta convocatoria</h3>";

                    foreach ($proyectos as $key2 ) {
                    echo "<div class='calendario'>";
                    echo "<h5>".$key2['titulo']."</h5>";
                    echo "<p>Presentación el dia ".$key2['fechaPresentacion']." a las ".$key2['horaPresentacion']." horas.</p>";
                    echo "</div>";
                    }
                    echo "</div>";

                    // Proyectos que aun no se han registrado en esta convocatoria
                    $var = Admin::singleton_admin();
                    $proyectos = $var->get_proyectos_sinregistrar_convocatoria($key['id']);
                    if (!empty($proyectos)) {
                        echo "<div class='presentaciones'>";

                        echo "<h3>Proyectos que no han completado el registro:</h3>";


                        foreach ($proyectos as $key2 ) {
                            echo "<div class='calendario'>";
                            echo "<h4>".$key2['email']."</h4>";
                            echo "<p>Fecha de expiracion: ".$key2['expiracion']."</p>";
                            echo "<form action='index.php?page=gestion' method='post'>";
                            echo "<input type='hidden' name='idProyecto' value='$key2[proyecto_id]'>";
                            echo "<input type='submit' name='alargarFecha' value='Alargar fecha'>";
                            echo "</form>";			
                            echo "</div>";
                            }
                        echo "</div>";
                    }
                }
            }

            echo "<div class='convocatorias'>";
                echo "<div class='annadir'>";
                    echo "<h2>Convocatorias</h2>";
                    echo "<form action='index.php?page=gestion' method='post'>";
                        echo "<input type='button' id='add_convocatoria' name='annadir' value='+'>";
                    echo "</form>";
                echo "</div>";

                echo "<div class='convocatoria2'>";
                    echo "<div class='convocatoria2_box'>";
                        echo "<h2>Convocatoria</h2>";
                        echo "<h2>Estado</h2>";
                        echo "<h2>Acciones</h2>";
                    echo "</div>";

                    foreach ($convocatorias as $key ) {
                    echo "<div class='convocatoria2_box'>";
                        echo "<h3> ".$key['convocatoria']."</h3>";
                        switch ($key['estado']) {
                            case 'Abierta':
                                echo "<h3 style='color:orange'>".$key['estado']."</h3>";
                            break;
                            case 'Actual':
                            echo "<h3 style='color:green'>".$key['estado']."</h3>";
                            break;
                            case 'Cerrada':
                                echo "<h3 style='color:red'>".$key['estado']."</h3>";
                            break;

                        }
                        echo "<div class='convocatoria_acciones'>";
                                
                                echo "<div id='acciones'>";
                                echo "<input type='button' name='cambiar_estado' id='cambiarEstado' value='C. Estado'>";

                                if ($key['estado'] == 'Abierta') {
                                echo "<form action='index.php?page=altas' id='form_acciones' method='post'>";
                                echo "<input type='submit' name='registrar_proyecto' value='Reg. Proyecto'>";
                                echo "<input type='hidden' name='idConvocatoria' value=$key[id]>";
                                echo "</form>";

                                echo "<form action='index.php?page=asignarFecha' id='form_acciones' method='post'>";
                                echo "<input type='submit' name='asignar_fecha' value='Asig. Fecha'>";
                                echo "<input type='hidden' name='idConvocatoria' value=$key[id]>";
                                echo "</form>";

                                }  
                                
                                echo "<div id='estados'>";
                                echo "<form action='index.php?page=gestion' id='form_cambio' method='post'>";

                                echo "<select name='estado'>";
                                echo "<option>Abierta</option>";
                                echo "<option>Actual</option>";
                                echo "<option>Cerrada</option>";
                                echo "</select>";
                                echo "<input type='hidden' name='idConvocatoria' value=$key[id]>";
                                echo "<input type='submit' name='cambiar_estado_convocatoria' value='Cambiar Estado'>";

                                echo "</form>";
                                echo "</div>"; 

                                echo "</div>";

                                
        
                            echo "</div>";                             
                        echo "</div>";
                    }
                echo "</div>";

                ?>
            </div>

            <!-- Div para añadir convocatoria, aparece al pulsar +  -->
            <div class="addConvocatoria" id="addConvocatoria">
                <?php
                echo "<div class='convocatorias'>";
                echo "<div class='convocatoria2'>";

                echo "<h2>Añadir convocatoria</h2>";
                mostrarFormulario();
                echo "</div>";

                echo "</div>";
                ?>
            </div>


    </div>

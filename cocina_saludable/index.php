<?php 

    ob_start();

    session_start();

    // Controlamos el tiempo de actividad 
    include('php/includes/tiempo.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Cocina Saludable</title>
</head>
<body>
    <header>
        <h1>Cocina Saludable</h1>
        <?php
            include('php/includes/nav.php');
        ?>
    </header>
    <main>

        <?php
            include('php/includes/main.php');
        ?>
    </main>
    <footer>
        <p>Diseño por Victoriano Sevillano Vega</p>
    </footer>
</body>
</html>

<?php 
	ob_end_flush();
?>

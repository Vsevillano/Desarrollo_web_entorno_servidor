<?php 
// Datos para la conexion a la BBDD
define("LOCALHOST", 'localhost');
define("DBNAME", 'proyectos');
define("CADCONEXION", "mysql:host=".LOCALHOST.";dbname=".DBNAME);
define("USER", 'root');
define("PSW", 'root');

// Inactividad de la sesion, por defecto, 1200s (20min).
define("INACTIVO", '1200');

// Datos para el envio de mensajes de alta
define("MAIL_FROM", 'mailejemplo.es');
define("MAIL_ASUNTO", 'Has sido dado de alta en Gestion de proyectos del IES Gran Capitan.');
define("MAIL_MESSAGE", 'Como alumno del I.E.S Gran Capitán, has sido dado de alta en "Gestion de proyectos". 
Por favor, acceda al siguiente enlace (en máximo 48h) para completar el registro:');
define("MAIL_URL_TOKEN", 'http://localhost/repaso/php/gestion_proyectos/');

// Datos para el envio de mensajes de los nuevos proyectos
define("MAIL_FROM_PROYECTO", 'mailejemplo.es');
define("MAIL_ASUNTO_PROYECTO", 'Registro de proyectos IES Gran Capitán.');
define("MAIL_MESSAGE_PROYECTO", 'Como alumno del I.E.S Gran Capitán, ahora puedes registrar tu proyecto.". 
Por favor, acceda al siguiente enlace (en máximo 48h) para completar el registro:');
define("MAIL_URL_TOKEN_PROYECTO", 'http://localhost/repaso/php/gestion_proyectos/');

// Datos para el envio de mensajes de comentarios
define("MAIL_COMENTARIO_FROM", 'mailejemplo.es');
define("MAIL_COMENTARIO_ASUNTO", 'Comentario en proyecto.');
define("MAIL_COMENTARIO_MESSAGE", 'Como invitado de la aplicacion "Gestion de proyectos", has solicitado comentar el siguiente proyecto.
Por favor, acceda al siguiente enlace (en máximo 48h) para comentar:');
define("MAIL_COMENTARIO_URL_TOKEN", 'http://localhost/repaso/php/gestion_proyectos/');


// Datos para el envio de mensajes de VALORACIONES
define("MAIL_VALORACION_FROM", 'mailejemplo.es');
define("MAIL_VALORACION_ASUNTO", 'Comentario en proyecto.');
define("MAIL_VALORACION_MESSAGE", 'Como invitado de la aplicacion "Gestion de proyectos", has solicitado comentar el siguiente proyecto.
Por favor, acceda al siguiente enlace (en máximo 48h) para comentar:');
define("MAIL_VALORACION_URL_TOKEN", 'http://localhost/repaso/php/gestion_proyectos/');

// Tiempo para alargar el envio del token --> 2 = 2 dias mas
define("TIEMPO_EXTRA", '2');

?>
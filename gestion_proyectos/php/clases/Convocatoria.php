<?php
require_once 'Conexion.php';
require_once("config.php");

class Convocatoria {
    
    private static $instancia;
    private $dbh;    
    
    /* Contructor de convocatoria */ 
    private function __construct(){
        try {
            $this->dbh = Conexion::singleton_conexion();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    
    /* Singleton para el convocatoria */ 
    public static function singleton_convocatoria() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    /* Obtiene los proyectos de una convocatoria y un ciclo */ 
    public function get_proyectos_convocatoria($id, $ciclo) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('SELECT * FROM  fichaproyecto, proyectos where proyectos.convocatoria_id = :id and proyectos.ciclo = :ciclo and proyectos.id = fichaproyecto.proyecto_id;');
            $query->bindParam(':id', $id);
            $query->bindParam(':ciclo', $ciclo);
			$query->execute();
            $this->dbh = null;
			return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los proyectos de la convocatoria 'Actual' */ 
    public function comprobar_estado_convocatoria() {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare("SELECT * from convocatorias where estado = 'Actual'");
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    // Inserta una nueva convocatoria
    public function insertar_convocatoria($convocatoria) {
        $this->dbh = Conexion::singleton_conexion();        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `convocatorias` (`id`, `convocatoria`, `estado`) VALUES (NULL, :convocatoria, 'Abierta')");
            $query->bindParam(':convocatoria', $convocatoria);
            $query->execute();           
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene una convocatoria por nombre */ 
    public function get_convocatoria_nombre($convocatoria) {
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('select * from convocatorias where convocatoria = :convocatoria');
            $query->bindParam(':convocatoria', $convocatoria);
            $query->execute();
            $this->dbh = null;
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene la valoracion de un proyecto por id */ 
    public function get_valoracion($id) {
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('select * from valoraciones where fichaproyecto_id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los comentarios de un proyecto por id */ 
    public function get_comentarios_proyecto($id) {
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('SELECT * FROM `comentarios` WHERE comentarios.fichaproyecto_id = :id and activo=1');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los componentes de un proyecto por id */ 
    public function get_componentes($id) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('select * from componentes where fichaproyecto_id = :id');
            $query->bindParam(':id', $id);
			$query->execute();
            $this->dbh = null;
			return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    /* Obtiene las anotaciones de un proyecto por id */ 
    public function get_anotaciones($id) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('SELECT * FROM anotaciones where anotaciones.ficha_id = :id');
            $query->bindParam(':id', $id);
			$query->execute();
            $this->dbh = null;
			return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Inserta una anotacion en un proyecto*/ 
    public function insertar_anotacion($id, $anotacion) { 
        $fecha = date("d")."/".date("m")."/".date("Y");  
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('INSERT INTO `anotaciones` (`id`, `anotacion`, `fecha`, `ficha_id`) VALUES (NULL, :anotacion, :fecha, :id)');
            $query->bindParam(':id', $id);
            $query->bindParam(':fecha', $fecha);
            $query->bindParam(':anotacion', $anotacion);   
            $query->execute();
            $this->dbh = null;
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Asigna mas tiempo de registro a un proyecto*/ 
    public function alargar_fecha_proyecto($id, $tiempo) {
        $fecha = date("Y")."-".date("m")."-".(date("d")+$tiempo)." ".date("H").":".date("i:s"); 
        $this->dbh = Conexion::singleton_conexion();    
        
        try {
            $query = $this->dbh->prepare('UPDATE `proyectos` SET `expiracion` = :fecha WHERE `proyectos`.`id` = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':fecha', $fecha);
            
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Activa los comentarios proyecto por id */ 
    public function activar_comentarios($id) {
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('UPDATE `fichaproyecto` SET `activarEdicion` = 1 WHERE `fichaproyecto`.`proyecto_id` = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Desctiva los comentarios proyecto por id */ 
    public function desactivar_comentarios($id) {
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('UPDATE `fichaproyecto` SET `activarEdicion` = 0 WHERE `fichaproyecto`.`proyecto_id` = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Actializa el estado de una convocatoria */ 
    public function actualizar_convocatoria($idConvocatoria, $estado) {
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('UPDATE `convocatorias` SET `estado` = :estado WHERE `convocatorias`.`id` = :idConvocatoria');
            $query->bindParam(':estado', $estado);
            $query->bindParam(':idConvocatoria', $idConvocatoria);
            $query->execute();
            $this->dbh = null;
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene un proyecto por titulo, descripcion o etiquetas */ 
    public function buscar_proyecto($busqueda) {
        $this->dbh = Conexion::singleton_conexion();
        $busqueda = '%'.$busqueda.'%';
        try {
            $query = $this->dbh->prepare('SELECT * from fichaproyecto where fichaproyecto.titulo like :busqueda or descripcion like :busqueda or etiquetas like :busqueda');
            $query->bindParam(':busqueda', $busqueda);
			$query->execute();
            $this->dbh = null;
			return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene un proyecto por id */ 
    public function get_proyecto($id) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('SELECT * FROM `fichaproyecto` where fichaproyecto.proyecto_id = :id');
            $query->bindParam(':id', $id);
			$query->execute();
            $this->dbh = null;
			return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene todas las convocatorias */ 
    public function get_convocatorias(){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare("select * from convocatorias");
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene una convocatoria por id */ 
    public function get_convocatoria($id) {
        try {
            $query = $this->dbh->prepare('select * from convocatorias where id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene las etiquetas de todos los proyectos */ 
    public function get_etiquetas_proyectos() {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('SELECT etiquetas FROM  fichaproyecto');
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Actualiza / completa el registro de un proyecto */ 
    public function actualizar_proyecto_registro($id, $titulo, $descripcion,$enlaceInt, $enlaceExt, $enlaceRepo, $etiquetas, $codigo, $logo) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('UPDATE `fichaproyecto` SET `titulo` = :titulo, `descripcion` = :descripcion, `enlaceinterno` = :enlaceInt, `enlaceexterno` = :enlaceExt, `enlacerepositorio` = :enlaceRepo, codigo = :codigo, `logo` = :logo, `etiquetas` = :etiquetas WHERE `fichaproyecto`.`proyecto_id` = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':titulo', $titulo);
            $query->bindParam(':descripcion', $descripcion);
            $query->bindParam(':enlaceInt', $enlaceInt);
            $query->bindParam(':enlaceExt', $enlaceExt);
            $query->bindParam(':enlaceRepo', $enlaceRepo);
            $query->bindParam(':etiquetas', $etiquetas);
            $query->bindParam(':codigo', $codigo);
            $query->bindParam(':logo', $logo);
            $query->execute();
            $this->dbh = null;
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Actualiza / completa la tabla proyectos */ 
    public function actualizar_fichaProyecto($id, $ciclo) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('UPDATE `proyectos` SET `ciclo` = :ciclo, registrado = 1 WHERE `proyectos`.`id` = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':ciclo', $ciclo);
            $query->execute();
            $this->dbh = null;
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Solicita que un usuario pueda comentar.*/
    public function solicitar_comentario($id, $email) {
        // Generamos token 
        $token = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());
        
        $this->dbh = Conexion::singleton_conexion();        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `comentarios` (`id`, `fichaproyecto_id`, `email`, `comentario`, `activo`, `nombre`, `token`, `fecha_comentario`) VALUES (NULL, :id_proyecto, :email, '', '0', '', :token, NULL)");
            $query->bindParam(':id_proyecto', $id);
            $query->bindParam(':email', $email);
            $query->bindParam(':token', $token);
            $query->execute();           
            $this->dbh = null;
            
            /* Enviamos el mail */
            $this->dbh = Conexion::singleton_conexion();
            $id = $this->dbh->lastInsertId();
            $this->enviarMailComentario($token, $email, $id);
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Solicita que un usuario pueda comentar.*/
    public function solicitar_valoracion($id, $email) {
        // Generamos token 
        $token = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());
        
        $this->dbh = Conexion::singleton_conexion();        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `valoraciones` (`id`, `fichaproyecto_id`, `email`, `valoracion`, `nombre`, `token`) VALUES (NULL, :id, :email, NULL, '', :token);");
            $query->bindParam(':id', $id);
            $query->bindParam(':email', $email);
            $query->bindParam(':token', $token);
            $query->execute();           
            $this->dbh = null;
                        
            $this->dbh = Conexion::singleton_conexion();
            $this->enviarMailValoracion($token, $email, $id);
            header('Location: index.php?page=inicio&error=8');
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Envia un email para que el usuario pueda comentar en un proyecto */
    private function enviarMailValoracion($token, $email,$id) {
        $destinatario = $email; 
        $asunto = MAIL_VALORACION_ASUNTO; 
        $cuerpo = MAIL_VALORACION_MESSAGE.' '.MAIL_VALORACION_URL_TOKEN.'index.php?page=valorar&token='.$token.'&idProyecto='.$id;
        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=UTF-8\r\n"; 
        //dirección del remitente 
        $headers .= "From: Gestion de proyectos <".MAIL_VALORACION_FROM.">\r\n"; 
        
        mail($destinatario,$asunto,$cuerpo,$headers) ;
    }
    
    /* Actualiza la tabla comentarios con el nuevo comentario */
    public function actualiza_valoracion($id, $puntuacion, $nombre) {   
        
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('UPDATE `valoraciones` SET `valoracion` = :puntuacion, `nombre` = :nombre WHERE `valoraciones`.`fichaproyecto_id` = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':puntuacion', $puntuacion);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Envia un email para que el usuario pueda comentar en un proyecto */
    private function enviarMailComentario($token, $email,$id) {
        $destinatario = $email; 
        $asunto = MAIL_COMENTARIO_ASUNTO; 
        $cuerpo = MAIL_COMENTARIO_MESSAGE.' '.MAIL_COMENTARIO_URL_TOKEN.'index.php?page=comentar&token='.$token.'&idProyecto='.$id;
        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=UTF-8\r\n"; 
        //dirección del remitente 
        $headers .= "From: Gestion de proyectos <".MAIL_COMENTARIO_FROM.">\r\n"; 
        
        mail($destinatario,$asunto,$cuerpo,$headers) ;
    }
    
    /* Comprueba que el token pertenece al id del usuario que va a comentar */ 
    public function comprobarTokenComentario($token, $id) {   
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('select * from comentarios WHERE id = :id and token = :token');
            $query->bindParam(':id', $id);
            $query->bindParam(':token', $token);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Comprueba que el token pertenece al id del usuario que va a comentar */ 
    public function comprobarTokenValoracion($token, $id) {   
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('select * from valoraciones WHERE fichaproyecto_id = :id and token = :token');
            $query->bindParam(':id', $id);
            $query->bindParam(':token', $token);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Comprueba que el token pertenece al id del usuario que va a comentar */ 
    public function comprobarCorreoValoracion($id, $email) {   
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('SELECT * FROM `valoraciones` where email = :email and fichaproyecto_id = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':email', $email);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    /* Actualiza la tabla comentarios con el nuevo comentario */
    public function actualiza_comentario($id, $nombre, $comentario) {   
        $fecha = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i:s"); 
        $this->dbh = Conexion::singleton_conexion();        
        
        try {
            $query = $this->dbh->prepare('UPDATE `comentarios` SET `comentario` = :comentario, `activo` = 1, `nombre` = :nombre, `fecha_comentario` = :fecha WHERE `comentarios`.`id` = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':comentario', $comentario);
            $query->bindParam(':fecha', $fecha);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Inserta un componente en un proyecto por id */
    public function insertar_componente($id, $nombre, $email, $imagen) {
        $this->dbh = Conexion::singleton_conexion();        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `componentes` (`id`, `fichaproyecto_id`, `nombre`, `email`, `imagen`) VALUES (NULL, :id, :nombre, :email, :imagen)");
            $query->bindParam(':id', $id);
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':email', $email);
            $query->bindParam(':imagen', $imagen);
            $query->execute();           
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Evita la clonacion de la clase */ 
    public function __clone(){
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }  
}
?>
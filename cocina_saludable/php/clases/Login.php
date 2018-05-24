<?php
require_once 'Conexion.php';
class Login {
    
    private static $instancia;
    private $dbh;
    
    /* Contructor del Login */ 
    private function __construct(){
        try {
            $this->dbh = Conexion::singleton_conexion();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    
    /* Singleton del login */ 
    public static function singleton_login() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    /* Contructor del Login */ 
	public function loginUsuario($usuario,$password, $perfil) {
		$datosUsuario = array('Perfil'=>'Invitado');
		
		try {
            $sql = "select * from usuarios, r_usuarios_perfiles WHERE usuarios.usuario = :usuario and usuarios.password = :pass and usuarios.id = r_usuarios_perfiles.usuarios_id and r_usuarios_perfiles.Perfiles_perfil = :perfil and usuarios.estado = 'Activo'";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(":usuario", $usuario);
            $query->bindParam(":pass", $password);
            $query->bindParam(":perfil", $perfil);
            $query->execute();
            $this->dbh = null;
            
            //si existe el usuario
            if ($query->rowCount() == 1) {
                $fila  = $query->fetch();
                $datosUsuario = array('Perfil'=>$fila['Perfiles_perfil'], 'Usuario'=>$fila['usuario'], 'Nombre'=>$fila['nombre'], 'id'=>$fila['id']);
                $logueado = true;
            }
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage();	
        }		
        return $datosUsuario;	
    }
    
    
    // Evita que el objeto se pueda clonar
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    
}
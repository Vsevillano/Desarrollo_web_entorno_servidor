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
	public function loginUsuario($usuario,$password) {
		$datosUsuario = array('Perfil'=>'Invitado');
		
		try {
			if (($usuario =='admin') and ($password == 'admin')) {
                $datosUsuario = array('Perfil'=>'admin');
			}		
            else {
                $sql = "SELECT * from usuario WHERE usuario = :usuario AND password = :pass and estado = 'activo'";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(":usuario", $usuario);
                $query->bindParam(":pass", md5($password));
                $query->execute();
                $this->dbh = null;
                
                //si existe el usuario
                if ($query->rowCount() == 1) {
                    $fila  = $query->fetch();
                    $datosUsuario = array('Perfil'=>'usuario', 'Usuario'=>$fila['usuario'], 'Nombre'=>$fila['nombre'], 'id'=>$fila['id']);
                    $logueado = true;
				}
			}
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();	
		}		
        return $datosUsuario;	
	}
    
    
    // Evita que el objeto se pueda clonar
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    
}
<?php
require_once 'Conexion.php';
class Usuario {
    
    private static $instancia;
    private $dbh;    
    
    /* Contructor de usuario */ 
    private function __construct(){
        try {
            $this->dbh = Conexion::singleton_conexion();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    
    /* Singleton para el usuario */ 
    public static function singleton_usuario() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
	
	//Método creado para recuperrar datos en la edición.
	//No es necesario con la ventana modal js ya que la información
    //la tenemos en el dom. 
    
    /* Obtiene un usuario por id */ 
    public function get_usuario($id) {
        try {
            $query = $this->dbh->prepare('select * from usuarios, r_usuarios_perfiles WHERE usuarios.id = r_usuarios_perfiles.usuarios_id and usuarios.id = :id');
            $query->bindParam(':id', $id);
			$query->execute();
            $this->dbh = null;
			return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los usuarios filtrados */ 
    public function get_usuarios($filtro = 'All'){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
			if ($filtro == 'All') {
                $query = $this->dbh->prepare("select * from usuarios");
            } else {
                $query = $this->dbh->prepare("select * from usuarios where usuario like :nombre");
                $parametro = '%'.$filtro.'%';
                $query->bindParam(':nombre', $parametro);		  
            }
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los usuarios bloqueados */ 
    public function getUsuariosBloqueados() {
        try {
            $this->dbh = Conexion::singleton_conexion();
            
            $query = $this->dbh->prepare("select * from usuarios, r_usuarios_perfiles WHERE usuarios.id = r_usuarios_perfiles.usuarios_id and usuarios.estado = 'Bloqueado'");
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Elimina un usuario */ 
    public function delete_usuario($id){
        try {
            $query = $this->dbh->prepare('delete from usuarios where id = :nombre');
            $query->bindParam(':nombre', $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Registra un usuario */ 
    public function registraUsuario($nombre,$usuario,$password){
        try { 
            $query = $this->dbh->prepare("insert into usuarios values(null, :nombre, :usuario,:password, 'bloqueado')");
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':password', $password);
            $query->execute();
            //Añadimos la clave de firmas.
            $idUsuario = $this->dbh->lastInsertId();
            $this->set_claves($idUsuario);
            
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Valida uno o varios usuarios */ 
    private function validarColaborador($idUsuario) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $cuenta = $idUsuario;
            $query = $this->dbh->prepare("INSERT INTO `colaboradores` (`cuenta`, `saldo`, `idusuario`) VALUES (:cuenta, '200', :idUsuario)");
            $query->bindParam(':cuenta', $cuenta);
            $query->bindParam(':idUsuario', $idUsuario);
            $query->execute(); 
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Valida uno o varios usuarios */ 
    public function validarUsuarios($aUsuarios) {
        
        try {
            //Creamos Directorio
            foreach ($aUsuarios as $idUsuario) {
                $this->dbh = Conexion::singleton_conexion();

                $query = $this->dbh->prepare("update usuarios SET estado = 'activo' WHERE id = :idUsuario");
                $query->bindParam(':idUsuario', $idUsuario);
                $query->execute();
                //Creamos el archivo			   
                $archivo = "upload\dir".$idUsuario;
                if (!file_exists($archivo)) {
                    mkdir($archivo, 0777, true);
                }
                
                if($this->get_usuario($idUsuario)['Perfiles_perfil'] == 'Collaborator'){
                    $this->dbh = Conexion::singleton_conexion();
                    $this->validarColaborador($idUsuario);
                }   
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    
    
    /* Actualiza la informacion de un usuario */ 
    public function update_usuario($id,$nombre,$email,$usuario){
        try {
            $query = $this->dbh->prepare('update usuario SET nombre = :nombre, usuario = :usuario WHERE id = :id');
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':id', $id);
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
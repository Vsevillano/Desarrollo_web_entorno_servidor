<?php
require_once 'Conexion.php';
class Usuario {
    
    private static $instancia;
    private $dbh;
	
	private $_id;
	private $_nombre;
	private $_usuario;
	private $_password;
	private $_estado;
	private $_idClaveFirma;
	private $_documentos = Array();
    
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
            $query = $this->dbh->prepare('select * from usuario where id = :id');
            $query->bindParam(':id', $id);
			$query->execute();
            $this->dbh = null;
			return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    
    public function get_usuarios($filtro = 'All'){
        $this->dbh = Conexion::singleton_conexion();

        try {
			if ($filtro == 'All') {
                $query = $this->dbh->prepare("select * from usuario");
            } else {
                $query = $this->dbh->prepare("select * from usuario where nombre like :nombre");
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
                
                $query = $this->dbh->prepare("select * from usuario where estado = 'bloqueado'");
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
                $query = $this->dbh->prepare('delete from usuario where id = :nombre');
                $query->bindParam(':nombre', $id);
                $query->execute();
                $this->dbh = null;
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
        /* Registra un usuario */ 
        public function registraUsuario($nombre,$email,$usuario,$password){
            try { 
                $query = $this->dbh->prepare("insert into usuario values(null, :nombre, :email, :usuario,:password, 'bloqueado')");
                $query->bindParam(':nombre', $nombre);
                $query->bindParam(':email', $email);
                $query->bindParam(':usuario', $usuario);
                $password = md5($password);
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
        public function validarUsuarios($aUsuarios) {
            try {
                //Creamos Directorio
                foreach ($aUsuarios as $idUsuario) {
                    $query = $this->dbh->prepare("update usuario SET estado = 'activo' WHERE id = :idUsuario");
                    $query->bindParam(':idUsuario', $idUsuario);
                    $query->execute();
                    //Creamos el archivo			   
                    $archivo = "upload\dir". $idUsuario;
                    if (!file_exists($archivo)) {
                        mkdir($archivo, 0777, true);
                    } 
                }   
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
        /* Actualiza la informacion de un usuario */ 
        public function update_usuario($id,$nombre,$email,$usuario){
            try {
                $query = $this->dbh->prepare('update usuario SET nombre = :nombre, email = :email, usuario = :usuario WHERE id = :id');
                $query->bindParam(':nombre', $nombre);
                $query->bindParam(':email', $email);
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
        
        /* Asigna las claves a un usuario */ 
        private function set_claves($idUsuario){
            try {
                for ($i = 0; $i <8 ;$i++){
                    for ($j=0; $j <8; $j++) {
                        $n= rand(100,999);
                        $query = $this->
                        dbh->prepare('insert into clavefirma values (:valor, :idusuario, :fila, :columna)');
                        $query->bindParam(':valor', $n);
                        $query->bindParam(':idusuario', $idUsuario);
                        $query->bindParam(':fila', $i);
                        $query->bindParam(':columna', $j);
                        $query->execute();
                    }	
                }
                $this->dbh = null;
            }catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
        /* Genera las claves de firma de un usuario */ 
        public function generaClaveFirmas($idUsuario) {
            $nombreFichero = "upload\\dir".$idUsuario."\\cf".$idUsuario;
            $archivo=fopen($nombreFichero,"w") or die("Error al abrir el fichero");
            $resultado = $this->get_claves($idUsuario);
            
            //Imprimir cabecera
            fputs($archivo,"    ");
            
            for ($j=0;$j<8;$j++){
                fputs($archivo," {$j}  ");
            }
            
            fputs($archivo,"\n-----------------------------------\n");
            
            $indice=0;
            for ($i=0;$i<8;$i++) {
                fputs($archivo, "$i | ");
                for ($j=0;$j<8;$j++){
                    $cadena = $resultado[$indice]['id']. ' ';
                    fputs($archivo,$cadena); 
                    $indice++;
                }
                fputs($archivo, "\n");
            }
            fclose($archivo);
            return $nombreFichero; 
        }
        
        /* Obtiene las claves de un usuario */ 
        private function get_claves($idUsuario) {
            try {
                $query = $this->dbh->prepare('select * from clavefirma where idUsuario = :idUsuario');
                $query->bindParam(':idUsuario', $idUsuario);
                $query->execute();
                $this->dbh = null;
                return $query->fetchAll();
            }catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
        /* Obtiene el valor de una clave especifica de un usuario */ 
        public function get_ValorClave($idUsuario,$fila,$columna) {
            try {
                $query = $this->dbh->prepare('select id from clavefirma where idUsuario = :idUsuario and fila=:fila and columna=:columna');
                $query->bindParam(':idUsuario', $idUsuario);
                $query->bindParam(':fila', $fila);
                $query->bindParam(':columna', $columna);
                $query->execute();
                $this->dbh = null;
                return $query->fetch();  
            }catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
    ?>
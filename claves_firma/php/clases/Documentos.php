<?php
require_once 'Conexion.php';
class Documentos {
    
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
    public static function singleton_documentos() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    /* Sube un archivo */
    public function subirArchivo($id, $ruta, $descripcion){
        $conexion = Conexion::singleton_conexion();
        try { 
            $query = $this->dbh->prepare("INSERT INTO documentos (idUsuario, descripcion, fichero, estado, fechaFirma) VALUES (:id, :descr, :fichero, 'Pendiente', :fecha)");
            $query->bindParam(':id', $id);
            $query->bindParam(':descr', $descripcion);
            $query->bindParam(':fichero', $ruta);
            $fecha = date("Y-m-d H:i:s");
            $query->bindParam(':fecha', $fecha);
            $query->execute();
            
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los documentos */
    public function getDocuments($id){
        
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare("SELECT * FROM documentos where idUsuario = :id");
            $query->bindParam(':id', $id);		  
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();                
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    /* Valida la firma */
    public function validarFirma($id, $file, $filas, $columnas, $numero){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare("UPDATE documentos set estado='Firmado' where id=:file and (SELECT id FROM clavefirma WHERE idUsuario=:idUser and fila=:fila and columna=:columna and id=:numero)");
            $query->bindParam(':file', $file);	
            $query->bindParam(':idUser', $id);		  
            $query->bindParam(':fila', $filas);		  
            $query->bindParam(':columna', $columnas);		  
            $query->bindParam(':numero', $numero);		  

            $query->execute();
            $this->dbh = null;
            return $query;                
            
        }catch (PDOException $e) {
            $e->getMessage();
        }        
       
    }
    
    /* Comprueba el fichero a firmar */
    public function comprobarFicheroFirmar($id, $file){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare("SELECT id from documentos where idUsuario=:id and id=:file");
            $query->bindParam(':id', $id);	
            $query->bindParam(':file', $file);			  		  

            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();;                
            
        }catch (PDOException $e) {
            $e->getMessage();
        }  
    }
    
    /* Comprueba si el fichero se ha firmado */
    public function comprobarFicheroFirmado($id, $file){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare("SELECT id from documentos where idUsuario = :id and id=:file and estado='Firmado'");
            $query->bindParam(':id', $id);	
            $query->bindParam(':file', $file);			  		  

            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();;                
            
        }catch (PDOException $e) {
            $e->getMessage();
        }  
    }
    
    
    // Evita que el objeto se pueda clonar
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    
}
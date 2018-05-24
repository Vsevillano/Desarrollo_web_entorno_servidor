<?php
require_once 'Conexion.php';
class Colaborador {
    
    private static $instancia;
    private $dbh;    
    
    /* Contructor de colaborador */ 
    private function __construct(){
        try {
            $this->dbh = Conexion::singleton_conexion();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    
    /* Singleton para el colaborador */ 
    public static function singleton_colaborador() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    
    /* Registra un receta */ 
    public function insertaReceta($titulo,$ingredientes,$elaboracion, $etiquetas, $imagen, $idColaborador){
        $this->dbh = Conexion::singleton_conexion();
        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `recetas` (`id`, `titulo`, `ingredientes`, `elaboracion`, `etiquetas`, `publica`, `imagen`, `idColaborador`) VALUES (NULL, :titulo, :ingredientes, :elaboracion, :etiquetas, '1', :imagen, :idColaborador)");
            $query->bindParam(':titulo', $titulo);
            $query->bindParam(':ingredientes', $ingredientes);
            $query->bindParam(':elaboracion', $elaboracion);
            $query->bindParam(':etiquetas', $etiquetas);
            $query->bindParam(':imagen', $imagen);
            $query->bindParam(':idColaborador', $idColaborador);
            
            $query->execute();           
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /* Obtiene las recetas de un colaborador */ 
    public function get_recetas($id) {
        $this->dbh = Conexion::singleton_conexion();

        try {
            $query = $this->dbh->prepare('SELECT * from recetas WHERE idColaborador = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Oculta una receta */ 
    public function oculta_receta($idReceta, $idColaborador){
        try {
            $query = $this->dbh->prepare('update recetas SET publica = 0 WHERE id = :id and idColaborador = :idColaborador');
            $query->bindParam(':id', $idReceta);
            $query->bindParam(':idColaborador', $idColaborador);

            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Muesta una receta */ 
    public function mostrar_receta($idReceta, $idColaborador){
        try {
            $query = $this->dbh->prepare('update recetas SET publica = 1 WHERE id = :id and idColaborador = :idColaborador');
            $query->bindParam(':id', $idReceta);
            $query->bindParam(':idColaborador', $idColaborador);
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
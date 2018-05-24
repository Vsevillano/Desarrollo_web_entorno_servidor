<?php
require_once 'Conexion.php';
class Receta {
    
    private static $instancia;
    private $dbh;    
    
    /* Contructor de receta */ 
    private function __construct(){
        try {
            $this->dbh = Conexion::singleton_conexion();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    
    /* Singleton para el receta */ 
    public static function singleton_receta() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
	
	//Método creado para recuperrar datos en la edición.
	//No es necesario con la ventana modal js ya que la información
    //la tenemos en el dom. 
    
    /* Obtiene un receta por id */ 
    public function get_receta($id) {
        try {
            $query = $this->dbh->prepare('select * from recetas where id = :id and publica = "1"');
            $query->bindParam(':id', $id);
			$query->execute();
            $this->dbh = null;
			return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene un receta por id */ 
    public function getFavoritas($idUsuario) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('select * from recetas WHERE recetas.id in (select r_usuarios_recetas_favoritas.recetas_id from r_usuarios_recetas_favoritas where r_usuarios_recetas_favoritas.usuarios_id = :idUsuario)');
            $query->bindParam(':idUsuario', $idUsuario);
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Registra una receta favorita */ 
    public function recetaFavorita($idUsuario, $idReceta){
        $this->dbh = Conexion::singleton_conexion();
        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `r_usuarios_recetas_favoritas` (`id`, `usuarios_id`, `recetas_id`) VALUES (NULL, :idUsuario, :idReceta);");
            $query->bindParam(':idUsuario', $idUsuario);
            $query->bindParam(':idReceta', $idReceta);
            $query->execute();           
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene un receta por id */ 
    public function get_recomendacion() {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('SELECT id from recetas where (SELECT COUNT(usuarios_id) FROM `r_usuarios_recetas_favoritas` where recetas.id = r_usuarios_recetas_favoritas.recetas_id) >= 5');
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Elimina un receta */ 
    public function deleteFavorita($idUsuario, $idReceta){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('DELETE FROM `r_usuarios_recetas_favoritas` WHERE `r_usuarios_recetas_favoritas`.`recetas_id` = :idReceta and r_usuarios_recetas_favoritas.usuarios_id = :idUsuario');
            $query->bindParam(':idReceta', $idReceta);
            $query->bindParam(':idUsuario', $idUsuario);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Obtiene los recetas filtrados */ 
    public function get_recetas($filtro = 'All'){
        $this->dbh = Conexion::singleton_conexion();
        
        try {
			if ($filtro == 'All') {
                $query = $this->dbh->prepare("select * from recetas where publica = 1");
            } else {
                $query = $this->dbh->prepare("select * from recetas where titulo like :nombre and  publica = 1");
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
    
    
    /* Elimina un receta */ 
    public function delete_receta($id){
        try {
            $query = $this->dbh->prepare('delete from recetas where id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    /* Registra un receta */ 
    public function insertaReceta($titulo,$ingredientes,$elaboracion, $etiquetas, $imagen, $idColaborador){
        $this->dbh = Conexion::singleton_conexion();
        
        try { 
            $query = $this->dbh->prepare("INSERT INTO `recetas` (`id`, `titulo`, `ingredientes`, `elaboracion`, `etiquetas`, `publica`, `imagen`, `idColaborador`) VALUES (NULL, 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', '1', 'aaaaaaa', '6')");
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
    
    /* Registra un receta */ 
    public function votar_receta($idUsuario, $idReceta, $puntuacion){
        $this->dbh = Conexion::singleton_conexion();
        
        try { 
            $query = $this->dbh->prepare("INSERT INTO r_usuarios_recetas_votacion (usuarios_id, recetas_id, puntuacion) VALUES (:idUsuario, :idReceta, :puntuacion)");
            $query->bindParam(':idUsuario', $idUsuario);
            $query->bindParam(':idReceta', $idReceta);
            $query->bindParam(':puntuacion', $puntuacion);
            $query->execute();           
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    
    
    /* Obtiene un receta por id */ 
    public function get_votacion($idUsuario, $idReceta) {
        $this->dbh = Conexion::singleton_conexion();
        
        try {
            $query = $this->dbh->prepare('SELECT * FROM `r_usuarios_recetas_votacion` WHERE recetas_id = :idReceta and usuarios_id=:idUsuario');
            $query->bindParam(':idUsuario', $idUsuario);
            $query->bindParam(':idReceta', $idReceta);
            
            $query->execute();
            $this->dbh = null;
            return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    /* Actualiza la informacion de un receta */ 
    public function update_receta($id,$titulo,$ingredientes,$elaboracion, $etiquetas, $imagen, $idColaborador){
        try {
            $query = $this->dbh->prepare('update receta SET titulo = :titulo, ingredientes = :ingredientes, elaboracion = :elaboracion, etiquetas = :etiquetas, imagen = :imagen WHERE id = :id');
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':receta', $receta);
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
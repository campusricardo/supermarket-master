<?php

require_once("config_connect.php");

class Categories extends Connect{
    private $categoria_id;
    private $nombreCategoria;
    private $descripcion;
    private $imagen;

    public function __construct($categoria_id = 0, $nombreCategoria = '', $descripcion = '', $imagen = ''){
        $this->categoria_id = $categoria_id;
        $this->nombreCategoria = $nombreCategoria;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function setId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function getId() {
        return $this->categoria_id;
    }

    public function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    public function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function insertData() {
        try {
            $stmt = $this->dbCnx->prepare("INSERT INTO categorias (categoriaNombre, descripcion, imagen) VALUES (?, ?, ?)");
            $stmt->execute([$this->nombreCategoria, $this->descripcion, $this->imagen]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this -> dbCnx -> prepare("DELETE FROM categorias WHERE categoria_id = ?");
            $stm -> execute([$this->categoria_id]);
            return $stm -> fetchAll();
            echo "<script>alert('Registro eliminado');document.location='../index.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias WHERE categoria_id=?");
            $stm-> execute([$this-> categoria_id]);
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }
    public function update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE categorias SET categoriaNombre=?, descripcion=?, imagen=? WHERE categoria_id=?");
            $stm-> execute([$this->nombreCategoria, $this->descripcion, $this->imagen, $this->categoria_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
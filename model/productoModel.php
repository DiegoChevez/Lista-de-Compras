<?php
    class productoModel{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyecto/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function read(){
            $stament = $this->PDO->prepare("SELECT * FROM list");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
 
    }

?>
<?php
    class productoController{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyecto/model/productoModel.php");
            $this->model = new productoModel();
        }

        public function read(){
            return ($this->model->read()) ? $this->model->read() : false;
        }

    }

?>
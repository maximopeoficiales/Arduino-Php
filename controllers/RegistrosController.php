<?php
require_once("./Models/RegistroModel.php");

class RegistrosController
{
    private $model;
    public function __construct()
    {
        $this->model = new RegistroModel();
    }
    public function get($id_animal = '')
    {
        return $this->model->get($id_animal);
    }
    public function userExist($user, $pass)
    {
        return $this->model->userExist($user, $pass);
    }

    public function GetUserExist($user){    
        return $this->model->GetUserExist($user);
    }
    public function GetFechaPorMes($mes,$ano){
        return $this->model->GetFechaPorMes($mes,$ano);
    }
}

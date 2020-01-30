<?php
require_once("./models/Model.php");
class RegistroModel extends Model
{

    public function get($id = '')
    {
        $this->query = ($id != '')
            ? "SELECT * FROM datos WHERE id_animal = '$id'"
            : "SELECT * FROM datos";
        $this->get_query();/* ejecuta y devuelve un array */

        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);/* recorre y va agregarlos datos */
        }
        return $data; /* data tiene todos los datos de la bd */
    }

    public function userExist($user, $pass)
    {
        /* las '' son muy importantes aqui */
        $this->query = "SELECT * FROM usuarios WHERE username ='$user' AND pass = '$pass'";
        $this->get_query();/* ejecuta y devuelve un array */
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);/* recorre y va agregarlos datos */
        }
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
    }

    public function GetUserExist($user)
    {
        /* las '' son muy importantes aqui */
        $this->query = "SELECT * FROM usuarios WHERE username ='$user'";
        $this->get_query();/* ejecuta y devuelve un array */
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);/* recorre y va agregarlos datos */
        }
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
    }
    public function GetFechaPorMes($mes,$ano)
    {
        /* las '' son muy importantes aqui */
        $this->query = "SELECT * FROM datos WHERE MONTH(fecha) ='$mes'AND year(fecha)='$ano'";
        $this->get_query();/* ejecuta y devuelve un array */
        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);/* recorre y va agregarlos datos */
        }

        return $data;
    }
}

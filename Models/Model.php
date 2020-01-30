<?php
abstract class Model
{
    private static $db_host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "";
    private static $db_name = "registros";
    private static $db_charset = "utf8";
    private static $port= 3307;

    private $conexion;

    protected $query;
    protected $rows = array();

    abstract protected function get();

    /* metodo para conexion */
    private function db_open()
    {
        $this->conexion = new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            self::$db_name,
            self::$port
        );
        $this->conexion->set_charset(self::$db_charset);
    }
    /* cerrar la conexion */
    private function db_close()
    {
        $this->conexion->close();
    }
    /* ejecuta query de tipo insert,delete,update */
    protected function set_query()
    {
        $this->db_open();
        $this->conexion->query($this->query);
        $this->db_close();
    }

    /* obtener datos en un array,metodo get */
    protected function get_query()
    {
        $this->db_open();
        $result = $this->conexion->query($this->query);
        /* guardamos en un arrayy rows */
        while ($this->rows[] = $result->fetch_assoc());
        $result->free();
        $this->db_close();
        return array_pop($this->rows);/* quito el ultimo elemento */
    }
}

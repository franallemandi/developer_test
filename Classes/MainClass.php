<?php

    namespace Classes;

abstract class MainClass
{
    protected $connection;
    private $data = array();

    public function __construct($host, $user, $password, $base)
    {
        $this->connection = new \mysqli($host, $user, $password, $base);
        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }
    public function __destruct()
    {
        //
    }

    abstract protected function sqlQuery($list);
    abstract protected function skuCheck($list);
    abstract protected function convertList($list);
}

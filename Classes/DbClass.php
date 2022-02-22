<?php

    namespace Classes;

class DbClass
{
    public $connection;

    public static function setConnection($host, $user, $password, $base)
    {
        $connection = new \mysqli($host, $user, $password, $base);
        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        return $connection;
    }
}

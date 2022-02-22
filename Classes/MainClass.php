<?php

    namespace Classes;

abstract class MainClass
{
    protected $connection;

    public function __construct()
    {
        $this->connection = DbClass::setConnection(
            "localhost",
            "id17022664_fallemandi",
            "Galarza..333",
            "id17022664_phpmysqlintermedio"
        );
    }
    public function __destruct()
    {
        //
    }

    abstract protected function sqlQuery($list);
    abstract protected function skuCheck($list);
    abstract protected function convertList($list);
}

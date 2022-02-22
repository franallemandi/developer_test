<?php

    namespace Classes\Actions;

use Classes\MainClass;

class DeleteClass extends MainClass
{
    private $values;
    public function __construct($values_to_delete)
    {
        parent::__construct();
        $this->values = $values_to_delete;
        $list_delete = $this->convertList($this->values);
        $this->sqlQuery($list_delete);
    }
    public function convertList($list)
    {

        $list_delete = [];
        foreach ($list as $x) {
            $list_delete[] = intval($x);
        }
        array_shift($list_delete);
        return($list_delete);
    }
    public function sqlQuery($list_to_delete)
    {
        foreach ($list_to_delete as $element_id) {
            $cod_sql = "DELETE FROM products WHERE id='$element_id'";
            $answer = $this->connection->query($cod_sql);
        }
        header("Location:index.php");
    }
    public function skuCheck($list_to_delete)
    {
    }
}

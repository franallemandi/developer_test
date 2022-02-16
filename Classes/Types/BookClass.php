<?php

    namespace Classes\Types;

use Classes\MainClass;

class BookClass extends MainClass
{
    private $values;
    public function __construct($a, $b, $c, $d, $values_to_add)
    {
        parent::__construct(
            "localhost",
            "id17022664_fallemandi",
            "Galarza..333",
            "id17022664_phpmysqlintermedio"
        );
        $this->values = $values_to_add;
        $this->skuCheck($this->values);
    }
    public function sqlQuery($values)
    {

        $sku = $values['sku'];
        $name = $values['name'];
        $price = $values['price'] . " $";
        $description = "Weight: " . $values['weight'] . " KG";
        $cod_sql = "INSERT INTO products VALUES(DEFAULT,'$sku','$name','$price','$description')";
        $answer = $this->connection->query($cod_sql);
        header("Location:../");
    }
    public function skuCheck($values)
    {

        $sku = $values['sku'];
        $name = $values['name'];
        $price = $values['price'] . " $";
        $description = "Weight: " . $values['weight'] . " KG";
        $cod_sql = ["SELECT id,sku,name,price,description FROM products"];
        $escape = false;
        $escape_b = false;
        foreach ($cod_sql as $instruction) {
            $answer[] = $this->connection->query($instruction);
        };
        foreach ($answer as $result) {
            while ($row = $result->fetch_object()) {
                $list_info[] = $row;
            }
        }
        for ($i = 0; $i < count($list_info); $i++) {
            if (
                $list_info[$i]->name == $name && $list_info[$i]->price == $price &&
                $list_info[$i]->description == $description && $list_info[$i]->sku != $sku
            ) {
                $original_sku = $list_info[$i]->sku;
                $escape = true;
            }
            if (
                $list_info[$i]->sku == $sku && ($list_info[$i]->name != $name || $list_info[$i]->price != $price ||
                $list_info[$i]->description != $description)
            ) {
                $used_sku = $list_info[$i]->sku;
                $escape_b = true;
            }
        }
        if ($escape) {
            header("Location:index.html?sku=$original_sku");
        } elseif ($escape_b) {
            header("Location:index.html?sku_b=$used_sku");
        } else {
            $this->sqlQuery($this->values);
        }
    }
    public function convertList($list_to_delete)
    {
    }
}

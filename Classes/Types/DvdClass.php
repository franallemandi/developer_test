<?php

namespace Classes\Types;

use Classes\{MainClass, AddingClass};

class DvdClass extends MainClass
{
    private $values;
    private $sku;
    private $name;
    private $price;
    private $description;
    public function __construct($values_to_add)
    {
        parent::__construct();
        $this->sku = $values_to_add['sku'];
        $this->name = $values_to_add['name'];
        $this->price = $values_to_add['price'] . " $";
        $this->description = "Size: " . $values_to_add['size'] . " MB";
        $this->values = array("sku" => $this->sku,"name" => $this->name,
        "price" => $this->price,"description" => $this->description);
        $this->skuCheck($this->values);
    }
    public function skuCheck($values)
    {
        $new_add = new AddingClass();
        $new_add->skuCheck($this->values);
    }
    public function sqlQuery($values)
    {
    }
    public function convertList($list_to_delete)
    {
    }
}

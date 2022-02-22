<?php

    namespace Classes\Actions;

use Classes\MainClass;

class ProductsClass extends MainClass
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sqlQuery($list)
    {

        $cod_sql = ["SELECT id,sku,name,price,description FROM products ORDER BY id"];
        foreach ($cod_sql as $instruction) {
            $answer[] = $this->connection->query($instruction);
        };
        if (count($answer) > 0) {
            foreach ($answer as $result) {
                while ($row = $result->fetch_object()) {
                    $list_info[] = $row;
                }
            }
            echo'<div class="row row-cols-1 row-cols-md-4 g-4">';
            if (isset($list_info)) {
                for ($i = 0; $i < count($list_info); $i++) {
                    echo '<div class="col">
                            <div class="card">
                            <div class="card-body">
                                <input type="checkbox" name="' . intval($list_info[$i]->id) . '" value="' . intval(
                        $list_info[$i]->id
                    ) . '" class="delete-checkbox"><br>
                                <p class="card-text">' . $list_info[$i]->sku . '</p>
                                <p class="card-text">' . $list_info[$i]->name . '</p>
                                <p class="card-text">' . $list_info[$i]->price . '</p>
                                <p class="card-text">' . $list_info[$i]->description . '</p>
                            </div>
                            </div>
                        </div>';
                }
            }
        }
    }
    public function skuCheck($list)
    {
    }
    public function convertList($list_to_delete)
    {
    }
}

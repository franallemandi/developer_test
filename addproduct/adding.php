<?php

    spl_autoload_register(function ($class) {

        $path = '../' . str_replace('\\', '/', $class) . '.php';
        require($path);
    });
    $values = $_POST;
    $instruction = $_POST['instruction'];
    $new_add = "new \Classes\Types\\" . $instruction . "($" . "values);";
    $instruction_for_class = "$" . "new_add =" . $new_add;
    eval($instruction_for_class);

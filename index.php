<?php
    ob_start();

    spl_autoload_register(function ($class) {
        $path = str_replace('\\', '/', $class) . '.php';
        require($path);
    });
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Product List</title>
    <!--BOOTSTRAP stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!--end of BOOTSTRAP-->
    <link href="styles/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="separator_bar"></div>
        <nav id="sup_bar" class="navbar navbar-expand-lg navbar-light bg-light">
                <h1 class="page_title">Products List</h1>
            <div id="sup_buttons" class="container-fluid">
                <ul class="nav">
                    <li class="nav-item">
                        <button  style="margin-right:50px;" id="add" type="button" class="btn 
                        btn-primary" 
                        name="add" onclick="window.location.href='addproduct/'">ADD</button>   
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <form method="POST">
                        <button id="delete-product-btn" type="submit" name="mass_delete" class="btn 
                        btn-danger" >MASS DELETE</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
            </div>
        </nav>
    <div class="separator_bar"></div>
    <div class="separator_bar"></div>
    <div class="separator_bar"></div>
    <div id="boxes_container">
    
<?php
    $new_list = new \Classes\Actions\ProductsClass(
        "localhost",
        "id17022664_fallemandi",
        "Galarza..333",
        "id17022664_phpmysqlintermedio"
    );
    $new_list->sqlQuery($list = null);
    if (isset($_POST['mass_delete'])) {
        $new_delete = new \Classes\Actions\DeleteClass(
            "localhost",
            "id17022664_fallemandi",
            "Galarza..333",
            "id17022664_phpmysqlintermedio",
            $_POST
        );
    }
    ?>
        </form>
    </div>
<footer>
    <p class="ftr_desc">Scandiweb Test assignment</p>
</footer>
</body>
</html>

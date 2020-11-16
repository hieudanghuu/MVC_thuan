<?php
    require "model/DBconnection.php";
    require "model/Product.php";
    require "model/ProductDB.php";
    require "controller/ProductController.php";

    use \Controller\ProductController;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="navbar navbar-primary">
            <a class="text-danger" style="font-size: 50px;" href="index.php">PRODUCT</a>
               <?php
    if (isset($message)) {
        echo "<p class='text-success'>" . $message . "</p>";
    }
    ?>
        </div>
    </div>

    <?php
        $controller = new ProductController();

        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;

        switch ($page) {

            case 'add' :
                $controller->add();
            break;
            case 'delete' :
                $controller->delete();
            break;
            case 'edit':
                $controller->edit();
            break;
            case 'search' :
                $controller->search();
            break;
            default :
            $controller->index();
            break;

        }
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>
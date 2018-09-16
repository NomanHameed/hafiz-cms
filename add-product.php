<?php

use Controllers\ProductControllers;


if(isset($_POST['edit'])){
//    $product = \Models\Product::find($_POST['id']);
    $product = Models\Product::find($_POST['id']);
}else{
    $product = new  \Models\Product(['product_name' => '', 'product_code' => '']);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Feature</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Products</a>
            </li>
        </ul>
    </div>
</nav>
<br>


<div class="container">
    <div class="col-md-12">

        <?php
        $response = [];
        $productsController = new ProductsController();
        if(isset($_POST['save']) || isset($_POST['update'])){
            if(isset($_POST['save']))
                $response = $productsController->add($_POST, $_FILES);
            else if(isset($_POST['update']))
                $response = $productsController->update($_POST, $_FILES, $_POST['id']);

            if(isset($response['messages']['status'])
                &&
                count($response['messages']['messages']) > 0
            ){ ?>
                <div class="alert alert-<?php echo $response['messages']['status']; ?>">
                    <?php
                    foreach($response['messages']['messages'] as $message){
                        //foreach ($message as $alert) {
                        ?>
                        <div> <?php echo $message; ?></div>
                        <?php
                        //}
                    }
                    ?>
                </div>

                <?php
            }
        }
        if(isset($_POST['delete'])){
            $response=$productsController->delete($_POST);
//            echo $_POST['id'];
        }

        ?>

        <form method="post" action="add-product.php" class="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <input type="hidden" name="id" value="<?php echo $product->id ?>" />
                    <input
                        type="text" class="form-control"
                        placeholder="Product Name"
                        name="product_name"
                        value="<?php echo $product->product_name; ?>"
                    />
                </div>
                <div class="col-md-3">
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Product Code"
                        name="product_code"
                        value="<?php echo $product->product_code; ?>"
                    />
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="file" name="product_image">
                </div>
                <div class="col-md-2">
                    <button type="submit" name="<?php echo (isset($_POST['edit']))? 'update' : 'save'; ?>" class="btn btn-primary"> SAVE  </button>
                </div>
            </div>
            <br>
        </form>

    </div>
    <br>

    <?php
    include_once('products-table.php'); ?>

</body>
</html>
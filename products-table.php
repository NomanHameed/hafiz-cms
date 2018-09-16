<?php
$products = \Models\Product::all();

?>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Image</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) {?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->product_name; ?></td>
            <td><?php echo $product->product_code; ?></td>
            <td> <img class="img-thumbnail" style="width: 100px; height: 50px" src="product-images/<?php echo $product->source; ?>" /></td>
            <form action="add-product.php" method="post">
                <td>

                    <input type="hidden" name="id" value="<?php echo $product->id; ?>" />
                    <button type="submit" name="edit" class="btn btn-info">Edit</button>


                </td>
                <td><button type="submit" name="delete" class="btn btn-danger">Delete</button>

                </td>
            </form>
        </tr>
    <?php }?>
    </tbody>
</table>
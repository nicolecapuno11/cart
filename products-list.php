<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('John Doe', 'john@mail.com');
?>
<html>
<head>
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="logo">
    <img src="fruits.jpg" width=50px height=50px>
</div>
<h1> <b>Welcome <?php echo $customer->getName() ?>!</b></h1>
<h2>Products</h2>
<h4>
    <a href="shopping-cart.php">Shopping Cart</a>
</h4>

<?php foreach ($products as $product): ?>

<form action="add-to-cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Add to Cart</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="main">
                        <h5><?php echo $product->getName(); ?></h5>
                        <img src="<?php echo $product->getImage(); ?>" height="100px" />
                    </div>
                </td>
                <td>
                    <div>
                        <?php echo $product->getDescription(); ?><br/>
                    </div>
                </td>
                <td>
                    <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
                </td>
                <td>
                    <a href="#" class="btn btn-primary">ADD TO CART</a>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php endforeach; ?>

</body>
</html>
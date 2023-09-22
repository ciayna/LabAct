<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='/save' method='post'>
        <label>Product Name</label>
        <input type='hidden' name='id' value="<?php if (isset($pro['id'])) {echo $pro['id'];} ?>">
        <input type='text' name='ProductName' value="<?php if (isset($pro['ProductName'])) {echo $pro['ProductName'];} ?>">
        <br>
        <label>Product Description</label>
        <input type='text' name='ProductDescription' value="<?php if (isset($pro['ProductDescription'])) {echo $pro['ProductDescription'];} ?>">
        <br>
        <label>Product Category</label>
        <select name="ProductCategory" id="ProductCategory">
        <option value="">Select a category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['ProductCategory'] ?>"><?= $category['ProductCategory']?></option>
            <?php endforeach; ?>
        </select>    
        <br>
        <label>Product Quantity</label>
        <input type='number' name='ProductQuantity' value="<?php if (isset($pro['ProductQuantity'])) {echo $pro['ProductQuantity'];} ?>">
        <br>
        <label>Product Price</label>
        <input type='number' name='ProductPrice' value="<?php if (isset($pro['ProductPrice'])) {echo $pro['ProductPrice'];} ?>">
        <br>
        <input type='submit' value='save'>
    </form>
    <form action='/addcat' method='post'>
        <br>
        <label>Enter a New Product Category</label> 
        <br>
        <input type='text' name='ProductCategory' value="<?php ['ProductCategory']?>">
        <br>
        <input type='submit' value='save'>
    </form>
    <h1>Products</h1>
    <ul>
        <?php foreach ($product as $pr): ?>
            <li>
                <strong>Product Name:</strong> <?= $pr['ProductName'] ?><br>
                <strong>Product Description:</strong> <?= $pr['ProductDescription'] ?><br>
                <strong>Product Category:</strong> <?= $pr['ProductCategory'] ?><br>
                <strong>Product Quantity:</strong> <?= $pr['ProductQuantity'] ?><br>
                <strong>Product Price:</strong> <?= $pr['ProductPrice'] ?><br>
                <strong>Action:</strong> <a href="/delete/<?= $pr['id'] ?>">delete</a> | <a href="/edit/<?= $pr['id'] ?>">edit</a>
            </li>
        <?php endforeach; ?>   
    </ul>
</body>
</html>
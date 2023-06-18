<?php
@include 'config.php';
if(isset($_POST['add_product'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploadImg/'.$product_image;
    // add description
    $product_description = $_POST['product_description'];

    if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_description)){
        $message[] = 'please fill all';
    }else{
        // Insert data from php to database
        $insert = "INSERT INTO products(name, price, description, image) VALUES('$product_name','$product_price',
        '$product_description','$product_image')";
        $upload = mysqli_query($conn, $insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'new product added successfuly';
        }else{
            $message[] = 'could not add the product';
        }
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigMac | Admin Menu</title>
    <link rel="icon" type="image/x-icon" href="../images/logoBigMac.png">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="../dashboard/admin.css">

    <!-- Link Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- message php link -->
<?php 
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}
?>

<!-- Form add Product -->
<div class="admin-product-form-container">
        
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form" enctype="multipart/form-data">
            <h3 class="admin-title">Add New Product</h3>
            <input type="text" placeholder="Enter Product Name" name="product_name" class="box">
            <input type="number" placeholder="Enter Product Price" name="product_price" class="box">
            <input type="text" placeholder="Enter Descriptions" name="product_description" class="box">
            <label for="upload-photo"></label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" id="upload-photo">
            <input type="submit" class="btn-submit" name="add_product" value="Add Product">
            <!-- link button back to adminPage-->
            <a href="adminMenu.php" class="btn-back">back</a>
        </form>
        </div>
</body>
<?php
@include 'configMenu.php';
// 'edit' follow on (line98:'?edit=') adminPage.php  
$id = $_GET['edit'];
// 'edit_product' (line61: 'name="edit_product"') updatePage.php
if(isset($_POST['edit_product'])){
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
        // Change $insert => $update || INSERT TO => UPDATE
        $update = "UPDATE products SET name='$product_name', price='$product_price', image='$product_image', description='$product_description'
        WHERE id=$id";
        $upload = mysqli_query($connMenu, $update);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'update product successfuly';
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
    <title>BigMac | update</title>
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
<section class="update container">
    <div class="container center"></div>
    <!--  -->
    <?php
    $select = mysqli_query($connMenu, "SELECT * FROM products WHERE id=$id");
    while($row = mysqli_fetch_assoc($select)){
    ?>
    <!-- Form edit Product -->
    <div class="admin-product-form-container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form" enctype="multipart/form-data">
            <h3 class="admin-title">Update the Product</h3>
            <!-- Add value name -->
            <input type="text" placeholder="Enter Product Name" value="<?php $row['name']; ?>"
            name="product_name" class="box">
            <!-- add value price -->
            <input type="number" placeholder="Enter Product Price" value="<?php $row['price']; ?>"
            name="product_price" class="box">
            <!-- add description -->
            <input type="text" placeholder="Enter Descriptions" name="product_description" class="box">
            <!-- update image -->
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <input type="submit" class="btn-submit" name="edit_product" value="edit product">
            <!-- link button back to adminPage-->
            <a href="adminMenu.php" class="btn-back">back</a>
        </form>

        <?php }; ?>
        </div>
</section>
    
</body>
</html>
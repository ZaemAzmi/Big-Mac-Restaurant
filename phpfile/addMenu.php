

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
<?php
@include 'configMenu.php';
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
        $upload = mysqli_query($connMenu, $insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'new product added successfuly';
        }else{
            $message[] = 'could not add the product';
        }
    }
};
// delete table
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connMenu, "DELETE FROM products WHERE id = $id");
    header('location:adminMenu.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigMac | Preorder</title>
    <link rel="icon" type="image/x-icon" href="../images/logoBigMac.png">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="../userMenu.css">

    <!-- Link Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body class="bodyPage">
    <!-- header -->
    <header>
        <!-- Nav -->
        <div class="nav container">
            <a href="index.html" class="logo">BigMac</a>
            <!-- Nav opt -->
            <div class="group-middle-nav">
                <a href="../index.html" class="navBar">Home</a>
                <a href="../About.html" class="navBar">About</a>
                <a href="../book.html" class="navBar" >Booking</a>
                <a href="userMenu.php" class="active-navBar">Menu</a>
            </div>
            <div class="group-right-nav">
            <!-- Cart-ICon -->
            <i class='bx bx-cart' id="cart-icon"></i>
            <button class="btn-login" onclick="location.href='../Login.html'">login</button>
            </div>
            <!-- Order Section -->
            <div class="cart">
                <h2 class="cart-title">Your Order</h2>
                <!-- Content Order -->
                <div class="cart-content">
                    <!-- <div class="cart-box">
                        
                    </div> -->
                </div>
                <!-- Add button -->
                
                <!-- Total -->
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">RM0</div>
                </div>
                <!-- Buy Button -->
                <button type="button" class="btn-buy">Order Now</button>
                <!-- Cart Close -->
                <i class='bx bx-x' id="close-cart"></i>
            </div>
        </div>
    </header>
    <!-- Menu -->
    <?php
        $select = mysqli_query($connMenu, "SELECT * FROM products");
        ?>
    <section class="menu container">
        <div class="menu-title">
            <h2 class="menu-titles">Our Top Menu</h2>
            <span class="description">Discover Our Top-Rated Dishes And Culinary Delights. Our Menu Offers A Range Of Flavors And Options To Satisfy All Taste Buds</span>
        </div>
        <!-- Content -->
        
        
        <div class="menu-content">
        <?php
                while($row = mysqli_fetch_assoc($select)){
                    ?>
            <!-- Box  -->
            <div class="product-menu">
                <img src="uploadImg/<?php echo $row['image']; ?>" height="200" alt="" class="product-img">
                <h2 class="product-title"><?php echo $row['name']; ?></h2>
                <span class="price">RM<?php echo $row['price']; ?></span>
                <div class="ingredient"><?php echo $row['description'] ?></div>
                <!-- <div class="ingredient">A crispy breaded chicken breast served on a toasted bun with coleslaw, pickles, and a tangy honey mustard sauce</div> -->
                <i class='bx bx-cart-add add-cart'></i>
                <!--  -->
            </div>
            <?php };?>
        </div>
        
    </section>
    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer container">
            <div class="row">
                <div class="col">
                    <img src="images/logoBigMac.png" class="logo" alt="logo BigMac">
                    <p>Subscribe BigMac to get immediate offer and interesting menu.</p>
                    <source>
                </div>
                <div class="col">
                    <h3 class="location">Location <div class="underline"><span></span></div></h3>
                    <p>Bangsar, Kuala Lumpur</p>
                    <p class="email-id">bigmac@gmail.com</p>
                </div>
                <div class="col">
                    <h3>Contact Us <div class="underline"><span></span></div></h3>
                    <div class="social-icon">
                        <!-- icon -->
                        <i class='bx bxl-facebook icon'></i>
                        <i class='bx bxl-instagram-alt icon' ></i>
                        <i class='bx bxl-youtube icon' ></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright -->
        <hr>
        <div class="copyright">Copyright &copy; 2023 BigMac Restaurant</div>
    </footer>

    <!-- Link to JavaSrcipt -->
    <script src="../scripts/alt.js"></script>
    
</body>
</html>
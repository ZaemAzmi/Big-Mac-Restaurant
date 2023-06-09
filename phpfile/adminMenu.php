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
// delete table
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:adminMenu.php');
}
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
<body class="bodyPage">
    
    <nav class="nav">
        <!-- top -->
        <div class="top-nav">
            <div class="logo">
                <!-- menu icon -->
                <i class='bx bx-menu icon'></i>
                <span class="logo-name">BigMac</span>
            </div>
            <div class="profile">

                <span class="admin-name">Luqman</span>
            </div>
        </div>
        <!-- sidebar -->
        <div class="sidebar">
            <div class="logo">
                <!-- menu icon -->
                <i class='bx bx-menu icon'></i>
                <span class="logo-name">BigMac</span>
            </div>
            <!-- content -->
         <div class="sideBar-content">
            <ul class="lists">
                <!-- dashboard -->
                <li class="list">
                    <a href="../Adacc.html" class="nav-link">
                        <!-- add icon -->
                        <i class='bx bxs-dashboard icon'></i>
                        <span class="link">Dashboard</span>
                    </a>
                </li>
                <!-- account -->
                <li class="list">
                    <a href="" class="nav-link">
                        <i class='bx bxs-user-account icon' ></i>
                        <span class="link">Acount</span>
                    </a>
                </li>
                <!-- menu -->
                <li class="list">
                    <a href="" class="nav-link">
                        <i class='bx bxs-food-menu icon' ></i>
                        <span class="link">Order</span>
                    </a>
                </li>
                <!-- table -->
                <li class="list">
                    <a href="" class="nav-link">
                        <i class='bx bxs-bookmark icon'></i>
                        <span class="link">Table</span>
                    </a>
                </li>
            </ul>

            <!-- bottom-sidebar -->
            <div class="bottom-sidebar-content">
                <!-- settings -->
                <ul class="lists">
                    <li class="list">
                        <a href="" class="nav-link">
                            <i class='bx bxs-cog icon'></i>
                            <span class="link">Settings</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="" class="nav-link">
                            <i class='bx bx-log-out bx-flip-horizontal icon' ></i>
                            <span class="link">Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
         </div>
        </div>
    </nav>
    <!-- overlay -->
    <section class="overlay"></section>
    <!-- menu content -->
    <section class="menu container">
        <!-- space between button -->
            <div class="space">
                <!-- title -->
            <h3 class="title">Admin Menu</h3>
            <!-- Add animation add menu Button -->
            <a href="addMenu.php" class="btn-add">
                <button class="btn-add"> 
                    <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <!-- icon add -->
                        <i class='bx bxs-add-to-queue add'></i>
                    </div>
                    </div>
                    <span>Create</span>
                </button>
            </a>
        </div>

        <?php
        $select = mysqli_query($conn, "SELECT * FROM products");
        ?>
        <!-- Menu display Information -->
        <div class="product-display">

            <table class="product-display-table">

                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <!-- Link php with table -->
                <?php
                while($row = mysqli_fetch_assoc($select)){
                

                ?>
                    <tr>
                        <!-- Display table after add new menu -->
                        <td><img src="uploadImg/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>RM<?php echo $row['price']; ?>/-</td>
                        <td><?php echo $row['description'] ?></td>
                        <!-- Action section -->
                        <td>
                            <!-- edit fx -->
                            <a href="updatePage.php?edit=<?php echo $row['id']; ?>" class="edit">
                            <i class='bx bxs-edit btn-edit'></i>edit</a>
                            <!-- delete fx -->
                            <a href="adminMenu.php?delete=<?php echo $row['id']; ?>" class="delete">
                            <i class='bx bx-folder-minus btn-delete'></i>delete</a>
                        </td>
                    </tr>
                <?php };?>
            </table>

        </div>
    </section>
    <script src="../dashboard/admin.js"></script>
</body>
</html>
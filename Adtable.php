<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BigMac Restaurant</title>
        <link rel="icon" type="image/x-icon" href="./images/logoBigMac.png">
        <link rel="stylesheet" type="text/css" href="StyleAdmin.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    
    <body>


        <nav>
			<a href="Adacc.html">Manage Account</a> &nbsp; &nbsp;
			<a href="Admenu.html">Manage Menu</a> &nbsp; &nbsp;
			<a href="Adtable.html" class="active">Manage Table</a> &nbsp; &nbsp;
			<button id="logbutton" onclick="location.href='Login.html'">Log Out</button>
		</nav>

        <!-- Table Reserve Section Start -->
        <div class="table">
            <div class="table-header">
                <p>Table Availability</p>
                <div>
                    <input placeholder="Reservation">
                    <button class="add-new">Update</button>
                </div>
            </div>
        </div>

        <div class="table-section">
            <table style="background-color: white;">
                <thead>
                    <tr>
                        <th>No Table</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Booking Date</th>
                        <th>Customer quantity</th>
                        <th>Table Number</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php include 'phpfile/adminTable.php'; ?>

                </tbody>
            </table>
        </div>
        <!-- TABLE RESERVE SECTION eND -->

        <script src="scripts/adminTable.js"></script>
    </body>
</html>
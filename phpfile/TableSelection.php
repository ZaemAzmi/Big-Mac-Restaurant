<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logoBigMac.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>BigMac | Select Table</title>
    <link rel="stylesheet" href="../BigMac.css">
</head>
<body>
    <div id="TableSelectionBody" class="container-fluid">
        <div id="TSWrapper" class="container">
			<h1>
                <img src="../images/BigMaclogo.png" alt="BigMaclogo.png">
                Pick Your Tables</h1>
                <hr class="line">
                <?php
                
                include_once("config.php");

                session_start();

                $sql = "SELECT `Table Number`, `Status` FROM tabledb";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $tableStatus = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tableStatus[$row['Table Number']] = $row['Status'];
                    }

                    for ($i = 1; $i <= 30; $i++) {
                        $tableClass = $tableStatus[$i] === "Booked" ? "tableBooked" : "table";
                        $clickable = $tableStatus[$i] === "Booked" ? "" : "tableClicked('.$i.')";
                        echo '<div class="' . $tableClass . '" onclick="'.$clickable.'">Table ' . $i . '</div>';
                        if($i%5 === 0){
                            echo "<br>";
                        }
                    }
                }
                $result->close();
                $conn->close();
            ?>
            <br><br>
            
            <div id="buttonContainer">
                <div class="previous" onClick="previousClicked()">Previous</div>
            </div>
            
        </div>
    </div>
    
    <script src="..\scripts\table.js"></script>
</body>
</html>
<!-- PHP code to establish connection with the local server -->
<?php
// Username is root
$user = 'root';
$password = 'usbw';

// Database name is minisuper
$database = 'minisuper';


$servername = 'localhost';
$mysqli = new mysqli($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// SQL query to select data from the provedores table
$sql = "SELECT * FROM proveedores";
$result = $mysqli->query($sql);
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Proveedores Details</title>
    <link rel="stylesheet" href="styles.css">
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <section>
        <h1>Proveedores</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>ID Proveedor</th>
                <th>Proveedor</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php while ($rows = $result->fetch_assoc()) { ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['idProveedor']; ?></td>
                    <td><?php echo $rows['nomProv']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <a href="main.php" class="button">back</a>
    </section>
</body>

</html>

<?php
// Closing the connection
$mysqli->close();
?>
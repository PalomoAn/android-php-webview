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

// Initialize variable for search
$searchValue = "";

// Check if a search form is submitted
if (isset($_POST['search'])) {
    // Get the search value from the form
    $searchValue = $_POST['searchValue'];

    // Construct the SQL query based on the search value
    $sql = "SELECT *
            FROM deudas
            WHERE idDeuCli = '$searchValue'
            OR cliente LIKE '%$searchValue%'
            OR deudaIni = '$searchValue'
            OR estadocuenta = '$searchValue'
            OR fechaDeuda = '$searchValue'";
    $result = $mysqli->query($sql);
} else {
    // Default query to fetch all records
    $sql = "SELECT * FROM deudas";
    $result = $mysqli->query($sql);
}
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Deuda Clientes Details</title>
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
    <section>
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <h1>Deuda Clientes</h1>
        <!-- Display the search form -->
        <form method="POST" action="">
            <input type="text" name="searchValue" placeholder="Search Value">
            <input type="submit" name="search" value="Search">
        </form>

        <?php if ($result && $result->num_rows > 0) { ?>
            <!-- Display the table -->
            <table>
                <tr>
                    <th>ID DeuCli</th>
                    <th>Cliente</th>
                    <th>Deuda Inicial</th>
                    <th>estado cuenta</th>
                    <th>Fecha Deuda</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php while ($rows = $result->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['idDeuCli']; ?></td>
                        <td><?php echo $rows['cliente']; ?></td>
                        <td><?php echo $rows['deudaIni']; ?></td>
                        <td><?php echo $rows['estadocuenta']; ?></td>
                        <td><?php echo $rows['fechaDeuda']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <a href="main.php" class="button">back</a>
        <?php } else { ?>
            <p>No rows found for the selected criteria.</p>
        <?php } ?>

        <a href="menuprod.php" class="button">Back</a>
    </section>
</body>

</html>

<?php
// Closing the connection
$mysqli->close();
?>
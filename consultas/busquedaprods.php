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

// Fetch unique seccion values from productos table
$sqlSeccion = "SELECT DISTINCT seccion FROM productos";
$resultSeccion = $mysqli->query($sqlSeccion);

// Fetch unique product names from productos table
$sqlProducto = "SELECT DISTINCT nomProd FROM productos";
$resultProducto = $mysqli->query($sqlProducto);

// Initialize variables for search
$selectedSeccion = "";
$selectedProducto = "";

// Check if a search form is submitted
if (isset($_POST['search'])) {
    // Get the search values from the form
    $selectedSeccion = $_POST['seccion'];
    $selectedProducto = $_POST['producto'];

    // Construct the SQL query based on the search values
    $sql = "SELECT * FROM productos WHERE 1=1";
    if (!empty($selectedSeccion)) {
        $sql .= " AND seccion = '$selectedSeccion'";
    }
    if (!empty($selectedProducto)) {
        $sql .= " AND nomProd = '$selectedProducto'";
    }

    $result = $mysqli->query($sql);
} else {
    // Default query to fetch all records
    $sql = "SELECT * FROM productos";
    $result = $mysqli->query($sql);
}

// Fetch all product names for dropdown
$productNames = array();
while ($row = $resultProducto->fetch_assoc()) {
    $productNames[] = $row['nomProd'];
}
?>

<!-- HTML code to display search form and data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Productos Details</title>
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
        <h1>Productos</h1>
        <!-- Display the search form -->
        <form method="POST" action="">
            <label for="seccion">Sección:</label>
            <select name="seccion" id="seccion">
                <option value="">All</option>
                <?php while ($rowSeccion = $resultSeccion->fetch_assoc()) { ?>
                    <option value="<?php echo $rowSeccion['seccion']; ?>" <?php if ($selectedSeccion == $rowSeccion['seccion']) echo 'selected'; ?>>
                        <?php echo $rowSeccion['seccion']; ?>
                    </option>
                <?php } ?>
            </select>
            <label for="producto">Producto:</label>
            <select name="producto" id="producto">
                <option value="">All</option>
                <?php foreach ($productNames as $productName) { ?>
                    <option value="<?php echo $productName; ?>" <?php if ($selectedProducto == $productName) echo 'selected'; ?>>
                        <?php echo $productName; ?>
                    </option>
                <?php } ?>
            </select>
            <button type="submit" name="search">Search</button>
        </form>

        <?php if ($result && $result->num_rows > 0) { ?>
            <!-- Display the data in a table -->
            <table>
                <tr>
                    <th>Producto</th>
                    <th>cosProd</th>
                    <th>venProd</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nomProd']; ?></td>
                        <td><?php echo $row['cosProd']; ?></td>
                        <td><?php echo $row['venProd']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <a href="ventas.php" class="button">back</a>
        <?php } else { ?>
            <p>No results found.</p>
        <?php } ?>

    </section>
</body>

</html>

<?php
// Closing the connection
$mysqli->close();
?>

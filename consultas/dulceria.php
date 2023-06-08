<!-- PHP code to establish connection with the database -->
<?php
 
// Database connection configuration
$servername = 'localhost';
$username = 'root';
$password = 'usbw';
$database = 'minisuper';
 
// Create a connection
$mysqli = new mysqli($servername, $username, $password, $database);
 
// Check the connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
 
// Set the default value for the selected seccion
$selectedSeccion = "Dulceria";
 
// Check if a different seccion is selected
if (isset($_GET['seccion'])) {
    $selectedSeccion = $_GET['seccion'];
}
 
// SQL query to select data from the productos table with the selected seccion
$sql = "SELECT * FROM productos WHERE seccion = '$selectedSeccion'";
$result = $mysqli->query($sql);
?>
 
<!-- HTML code to display buttons and data in tabular format -->
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
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
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
        <!-- Buttons to select different seccion values -->
        <div>
            <?php
            // Array of seccion values
            $secciones = array("Botanas");
 
            // Loop through the secciones array to generate buttons
            foreach ($secciones as $seccion) {
                echo "<button onclick=\"location.href='Botanas.php?seccion=$seccion'\">$seccion</button>";
            }
            ?>
        </div>
 
        <?php if ($result && $result->num_rows > 0) { ?>
            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>ID Producto</th>
                    <th>Producto</th>
                    <th>Sección</th>
                    <th>Costo</th>
                    <th>Venta</th>
                    <th>Utilidad Bruta</th>
                    <th>Unidad de Medida</th>
                    <th>Perecedero</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php while ($rows = $result->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['idProd']; ?></td>
                        <td><?php echo $rows['nomProd']; ?></td>
                        <td><?php echo $rows['seccion']; ?></td>
                        <td><?php echo $rows['cosProd']; ?></td>
                        <td><?php echo $rows['venProd']; ?></td>
                        <td><?php echo $rows['utilBruProd']; ?></td>
                        <td><?php echo $rows['uniMed']; ?></td>
                        <td><?php echo $rows['perecedero']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <a href="seccion.php" class="button">back</a>
        <?php } else { ?>
            <p>No rows found for the selected seccion.</p>
        <?php } ?>
    </section>
</body>
 
</html>
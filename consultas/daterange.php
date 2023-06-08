<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date Range Search</title>
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
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
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

        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Define your database credentials
    $host = 'localhost';
    $user = 'root';
    $password = 'usbw';
    $database = 'minisuper';

    // Create a database connection
    $mysqli = new mysqli($host, $user, $password, $database);

    // Checking for connection errors
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Handle the search form submission
    if (isset($_POST['submit'])) {
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];

        // Prepare the SQL query with a date range filter
        $sql = "SELECT * FROM clientes WHERE fecha BETWEEN '$startDate' AND '$endDate'";

        // Execute the query
        $result = $mysqli->query($sql);
    }
    ?>

    <h1>Date Range Search</h1>

    <div class="search-container">
        <form method="post" action="">
            <input type="date" name="start_date" class="search-input" required>
            <input type="date" name="end_date" class="search-input" required>
            <input type="submit" name="submit" value="Search">
        </form>
    </div>

    <table>
        <tr>
            <th>ID Cliente</th>
            <th>Cliente</th>
            <th>Fecha</th>
        </tr>
        <?php
        // Display the search results
        if (isset($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idCliente'] . "</td>";
                echo "<td>" . $row['cliente'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
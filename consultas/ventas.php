<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navigation Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;;
        }

        .button {
            padding: 20px 40px;
            font-size: 24px;
            margin-bottom: 20px;
            text-decoration: none;
            color: black;
            
        }
    </style>
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="button-container">
        <a href="busquedadeuda.php" class="button">deudores</a>
        <a href="busquedaprods.php" class="button">precio productos</a>
        <a href="menuprod.php" class="button">Productos</a>
        <a href="main.php" class="button">back</a>
    </div>
</body>
</html>
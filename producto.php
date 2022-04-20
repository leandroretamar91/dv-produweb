<!DOCTYPE html>
<html lang="en">
    <head>
        <?php session_start();    
            if (!isset($_SESSION['isLogged'])) {
                $_SESSION['isLogged'] = false;
            }
        ?>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
        <!-- BS5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>

        <?php
            require_once 'includes/dbconnect.php';
            require_once 'modelos/infoAdicional.php';
            
            if (isset($_GET['id'])) {
                $prodID = $_GET['id'];

                $result = $conn->query(cargarProducto($prodID));

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc(); 
                    echo '<p>' . $row['nombre'];

                    $categoria = $row['categoria'];

                    $result = $conn->query(cargarDataExtra($row['categoria'], $prodID));

                    if ($result->num_rows > 0) {

                        $row = $result->fetch_assoc();
                        mostrarAdicional($categoria, $row);
                    }
                }
            } else {
                echo '404';
            }
        ?>



        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
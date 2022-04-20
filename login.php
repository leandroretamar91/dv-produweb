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
        if(isset($_POST['usuario'])) {
            require_once 'includes/dbconnect.php';

            var_dump($_POST['usuario']);
            var_dump($_POST['passwd']);

            $result = $conn->query("SELECT id, nombre, apellido, nivel FROM usuarios WHERE usuario = '" . $_POST['usuario'] . "' AND passwd = '" . $_POST['passwd'] . "'");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['nivel'] = $row['nivel'];

                $_SESSION['isLogged'] = true;

                header("Location: index.php");
            }
        }
    ?>

    <form action="login.php" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario">
        <label for="usuario">Contraseña</label>
        <input type="password" id="passwd" name="passwd">
        <input type="submit" value="Login">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
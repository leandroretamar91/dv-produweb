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

    <div style="height:100px"></div>

    <?php
        if ($_SESSION['isLogged']) {
            echo 'Nombre: ' . $_SESSION['nombre'] . '</br>';
            echo 'Apellido: ' . $_SESSION['apellido'] . '</br>';
            echo 'Nivel: ' . $_SESSION['nivel'] . '</br>';

            echo '<a href="logout.php">Logout!</a>';
            echo '</br></br>';

            echo '<a href="config.php">PANEL DE USUARIO</a></br>';
            echo '<a href="admin.php">PANEL ADMIN</a></br>';
            echo '<a href="assembly.php">PANEL ENSAMBLADO</a></br>';
            echo '<a href="dispatch.php">PANEL DESPACHANTE</a></br>';

        } else {
            echo '<a href="login.php">Login!</a>';
        }
    ?>

    <div style="height:100px"></div>

    <div class="row-wrapper p-3 mx-auto my-5 DEBUG">

        <?php

            require_once 'includes/dbconnect.php';

            $result = $conn->query(cargarListadoCompleto());

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                    echo '
                        <div class="row border shadow my-2">
                            <div class="col-8 p-2">
                                <a href="producto.php?id=' . $row['id'] . '">
                                    <h4> ' . $row['nombre'] . ' </h4>
                                </a>
                                
                                <p> Marca: ' . $row['marca'] . ' - Modelo: ' . $row['modelo'] . '
                            </div>
                            
                            <div class="col-4 p-3">
                                <div class=DEBUG style="height: 100%">
                                    <p>FOTO</p>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>

    </div>

    <div class="row-wrapper p-3 mx-auto my-5 DEBUG">

        <?php

            require_once 'includes/dbconnect.php';

            $cat = "microprocesador";

            $result = $conn->query(cargarListadoPorCategoria($cat));

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                    echo '
                        <div class="row border shadow my-2">
                            <div class="col-8 p-2">
                                <a href="producto.php?id=' . $row['id'] . '">
                                    <h4> ' . $row['nombre'] . ' </h4>
                                </a>
                                
                                <p> Marca: ' . $row['marca'] . ' - Modelo: ' . $row['modelo'] . '
                            </div>
                            
                            <div class="col-4 p-3">
                                <div class=DEBUG style="height: 100%">
                                    <p>FOTO</p>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>

    </div>
        
    <div class="row-wrapper p-3 mx-auto my-5 DEBUG">

        <?php

        require_once 'includes/dbconnect.php';
        
        $result = $conn->query($armador_cargarMothers);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                
                echo '
                    <div class="row border shadow my-2">
                        <div class="col-8 p-2">
                            <h4> ' . $row['nombre'] . ' </h4>
                            
                            <p> Marca: ' . $row['marca'] . ' - Modelo: ' . $row['modelo'] . '

                            <ul>
                                <li>Socket: ' . $row['socket'] . '</li>
                                <li>Chipset: ' . $row['chipset'] . '</li>
                                <li>PCIe x16: ' . $row['pciex16'] . '</li>
                                <li>PCIe x1: ' . $row['pciex1'] . '</li>
                                <li>SATA: ' . $row['sata'] . '</li>
                                <li>M2: ' . $row['m2'] . '</li>
                            </ul>
                        </div>
                        
                        <div class="col-4 p-3">
                            <div class=DEBUG style="height: 100%">
                                <p>FOTO</p>
                            </div>
                        </div>                    
                    </div>
                ';
            }
        }
        ?>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
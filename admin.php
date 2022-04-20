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

<div class="row-wrapper p-3 mx-auto my-5 DEBUG">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="inhabilitados-tab" data-bs-toggle="tab" data-bs-target="#inhabilitados" type="button" role="tab" aria-controls="inhabilitados" aria-selected="true">Inhabilitados</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="habilitados-tab" data-bs-toggle="tab" data-bs-target="#habilitados" type="button" role="tab" aria-controls="habilitados" aria-selected="false">Habilitados</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="inhabilitados" role="tabpanel" aria-labelledby="inhabilitados-tab">

            <?php
                if ($_SESSION['isLogged'] && $_SESSION['nivel'] == 3) {
                require_once 'includes/dbconnect.php';
                require_once 'modelos/infoAdicional.php';

                    $result = $conn->query(cargarListadoNoHabilitados());

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            
                            echo '
                                <div class="row border shadow my-2">
                                    <div class="col-12 p-2">
                                        <a href="producto.php?id=' . $row['id'] . '">
                                            <h4> ' . $row['nombre'] . ' </h4>
                                        </a>
                                        
                                        <p> Marca: ' . $row['marca'] . ' - Modelo: ' . $row['modelo'] . '
                                        <div class="accordion accordion-flush" id="accordion'.$row['id'].'">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading'.$row['id'].'">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['id'].'" aria-expanded="false" aria-controls="collapse'.$row['id'].'">
                                                    Modificar datos
                                                </button>
                                                </h2>
                                                <div id="collapse'.$row['id'].'" class="accordion-collapse collapse" aria-labelledby="heading'.$row['id'].'" data-bs-parent="#accordion'.$row['id'].'">
                                                    <div class="accordion-body row">
                                                        <form class=row action="admin_ModificarProducto.php" method="POST">
                                                            <div class="col-6">
                                                                <label for="nombre">Nombre</label></br>
                                                                <input type="text" id="nombre" name="nombre" value="'.$row['nombre'].'"></br>
                                                                <label for="marca">Marca</label></br>
                                                                <input type="text" id="marca" name="marca" value="'.$row['marca'].'"></br>
                                                                <label for="modelo">Modelo</label></br>
                                                                <input type="text" id="modelo" name="modelo" value="'.$row['modelo'].'"></br>
                                                                <label for="precio">Precio</label></br>
                                                                <input type="text" id="precio" name="precio" value="'.$row['precio'].'"></br>
                                                                <label for="stock">Stock</label></br>
                                                                <input type="text" id="stock" name="stock" value="'.$row['stock'].'"></br>';
                                                                
                                                                /*
                                                                <select id="categoria" name="categoria" value="'.$row['categoria'].'"></br>';
                                                                $categorias = $conn->query("SELECT categoria FROM listas_categorias");
                                                                while ($catrow = $categorias->fetch_array())
                                                                    if ($catrow[0] == $row['categoria'])
                                                                        echo '<option value="'.$catrow[0].'" selected>'.$catrow[0].'</option>';
                                                                    else
                                                                        echo '<option value="'.$catrow[0].'">'.$catrow[0].'</option>';
                                                                echo '
                                                                </select></br>*/

                                                                echo '
                                                                </br>
                                                                <label>Categoría: '.$row['categoria'].'</label></br>
                                                                <label>Subcategoría: '.$row['subcategoria'].'</label></br>
                                                                <input type="hidden" id="prodID" name="prodID" value="'.$row['id'].'">
                                                                <input type="hidden" id="categoria" name="categoria" value="'.$row['categoria'].'">
                                                                <input type="hidden" id="subcategoria" name="subcategoria" value="'.$row['subcategoria'].'">
                                                            </div>
                                                            <div class="col-6">';
                                                                $adicionales = $conn->query(cargarDataExtra($row['categoria'], $row['id']));
                                                                
                                                                if ($adicionales->num_rows > 0) {
                                            
                                                                    $adicrow = $adicionales->fetch_assoc();                                                        
                                                                    editarAdicional($row['categoria'], $adicrow);
                                                                }
                                                                
                                                                echo '
                                                                <input type="submit" value="Ok">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                } else {
                    echo '<h1> NO PUEDES ESTAR AQUI </h1>';
                }
            ?>

        </div>
        <div class="tab-pane fade" id="habilitados" role="tabpanel" aria-labelledby="habilitados-tab">
            <?php
                if ($_SESSION['isLogged'] && $_SESSION['nivel'] == 3) {
                require_once 'includes/dbconnect.php';
                require_once 'modelos/infoAdicional.php';

                    $result = $conn->query(cargarListadoHabilitados());

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            
                            echo '
                                <div class="row border shadow my-2">
                                    <div class="col-12 p-2">
                                        <a href="producto.php?id=' . $row['id'] . '">
                                            <h4> ' . $row['nombre'] . ' </h4>
                                        </a>
                                        
                                        <p> Marca: ' . $row['marca'] . ' - Modelo: ' . $row['modelo'] . '
                                        <div class="accordion accordion-flush" id="accordion'.$row['id'].'">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading'.$row['id'].'">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['id'].'" aria-expanded="false" aria-controls="collapse'.$row['id'].'">
                                                    Modificar datos
                                                </button>
                                                </h2>
                                                <div id="collapse'.$row['id'].'" class="accordion-collapse collapse" aria-labelledby="heading'.$row['id'].'" data-bs-parent="#accordion'.$row['id'].'">
                                                    <div class="accordion-body row">
                                                        <form class=row action="admin_ModificarProducto.php" method="POST">
                                                            <div class="col-6">
                                                                <label for="nombre">Nombre</label></br>
                                                                <input type="text" id="nombre" name="nombre" value="'.$row['nombre'].'"></br>
                                                                <label for="marca">Marca</label></br>
                                                                <input type="text" id="marca" name="marca" value="'.$row['marca'].'"></br>
                                                                <label for="modelo">Modelo</label></br>
                                                                <input type="text" id="modelo" name="modelo" value="'.$row['modelo'].'"></br>
                                                                <label for="precio">Precio</label></br>
                                                                <input type="text" id="precio" name="precio" value="'.$row['precio'].'"></br>
                                                                <label for="stock">Stock</label></br>
                                                                <input type="text" id="stock" name="stock" value="'.$row['stock'].'"></br>';
                                                                
                                                                /*
                                                                <select id="categoria" name="categoria" value="'.$row['categoria'].'"></br>';
                                                                $categorias = $conn->query("SELECT categoria FROM listas_categorias");
                                                                while ($catrow = $categorias->fetch_array())
                                                                    if ($catrow[0] == $row['categoria'])
                                                                        echo '<option value="'.$catrow[0].'" selected>'.$catrow[0].'</option>';
                                                                    else
                                                                        echo '<option value="'.$catrow[0].'">'.$catrow[0].'</option>';
                                                                echo '
                                                                </select></br>*/

                                                                echo '
                                                                </br>
                                                                <label>Categoría: '.$row['categoria'].'</label></br>
                                                                <label>Subcategoría: '.$row['subcategoria'].'</label></br>
                                                                <input type="hidden" id="prodID" name="prodID" value="'.$row['id'].'">
                                                                <input type="hidden" id="categoria" name="categoria" value="'.$row['categoria'].'">
                                                                <input type="hidden" id="subcategoria" name="subcategoria" value="'.$row['subcategoria'].'">
                                                            </div>
                                                            <div class="col-6">';
                                                                $adicionales = $conn->query(cargarDataExtra($row['categoria'], $row['id']));
                                                                
                                                                if ($adicionales->num_rows > 0) {
                                            
                                                                    $adicrow = $adicionales->fetch_assoc();                                                        
                                                                    editarAdicional($row['categoria'], $adicrow);
                                                                }
                                                                
                                                                echo '
                                                                <input type="submit" value="Ok">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                } else {
                    echo '<h1> NO PUEDES ESTAR AQUI </h1>';
                }
            ?>
        </div>
    </div>
</div>


<div class="row-wrapper p-3 mx-auto my-5 DEBUG">



</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
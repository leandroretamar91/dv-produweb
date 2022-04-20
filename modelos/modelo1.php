<?php

function presentarLogueo() {

    if ($_SESSION['isLogged']) {
        echo '
                <div class="dropdown me-5">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">';
            echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
        echo '
        </a>

        <ul class="dropdown-menu me-4" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="admin.php">Administrar productos</a></li>
            <li><a class="dropdown-item" href="config.php">Configuración de cuenta</a></li>
            <li><a class="dropdown-item" href="assembly.php">Panel de Ensamblador</a></li>
            <li><a class="dropdown-item" href="dispatch.php">Panel de Despachante</a></li>
            <li><hr></li>
            <li><a class="dropdown-item" href="logout.php">Desloguearse</a></li>
        </ul>
        </div> ';

    } else {
        echo '<div> <a class="fo me-3 datos" href="login.php">Login</a></br> </div>';
        echo '<div> <a class="fo me-3 datos" href="registro.php">Registrarse</a></br> </div>';
    }
}
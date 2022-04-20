<!doctype html>
<html lang="es">

<head>

  <?php session_start();    
            if (!isset($_SESSION['isLogged'])) {
                $_SESSION['isLogged'] = false;
            }
      ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
  <script src="https://kit.fontawesome.com/f28549af1d.js" crossorigin="anonymous"></script>
  <title>Hello, world!</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-pag">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Arma tu PC</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Productos</a>
            </li>
          </ul>

          <?php
        require_once 'modelos/modelo1.php';
        presentarLogueo();
      ?>

        </div>
      </div>
    </nav>

  </header>
  <div class="container-fluid">
    <div class="row p-0">
      <div class="col p-0">
        <div class="card bg-dark text-white bor">
          <img src="./imagenes/4.jpg" alt="">
          <div class="card-img-overlay text-center mt-5">
            <h5 class="card-title">Productos destacados</h5>
          </div>
        </div>
      </div>
    </div>

  </div>
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-9">
          <div class="row row-cols-1 row-cols-sm-2  row-cols-md-2 row-cols-lg-3 g-4 text-center mt-4">
            <div class="col">
              <div class="card shadow p-3 mb-5 bg-body rounded">
                <a href=""><i class="fa-solid fa-microchip display-4 text-violeta iconospro"></i></a>
                <div class="card-body">
                  <a href="" class="pro">
                    <p class="card-title ">Procesadores</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow p-3 mb-5 bg-body rounded">
                <i class="fa-solid fa-keyboard display-4"></i>
                <div class="card-body">
                  <p class="card-title ">Motherboards</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow p-3 mb-5 bg-body rounded">
                <i class="fa-solid fa-keyboard display-4"></i>
                <div class="card-body">
                  <p class="card-title ">Discos</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow p-3 mb-5 bg-body rounded">
                <i class="fa-solid fa-keyboard display-4"></i>
                <div class="card-body">
                  <p class="card-title ">Memorias</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow p-3 mb-5 bg-body rounded">
                <i class="fa-solid fa-keyboard display-4"></i>
                <div class="card-body">
                  <p class="card-title ">Fuentes</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow p-3 mb-5 bg-body rounded">
                <i class="fa-solid fa-keyboard display-4"></i>
                <div class="card-body">
                  <p class="card-title ">Accesorios</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-fluid p-0 mt-5">
      <div class="card bg-dark text-white bor text-center">
        <video src="./imagenes/3.mp4" class="video" autoplay loop muted></video>
        <div class="card-img-overlay">
          <h5 class="card-title d-none d-sm-block">Arma tu PC</h5>
          <p class="card-text d-none d-md-block">Podes usar nuestra herramienta para armar la pc que estas buscando!</p>
          <a href="" class="btn btn-outline-light">Arma tu pc</a>
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5">
    <div class="container-fluid">
      <h1 class="mt-5 h3 text-center text-uppercase font-weight-light mb-5">Promociones</h1>
      <div class="row">
        <div class="col">
          <div id="idslider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">

              <?php
  $totalSlides = rand(2, 9);
  $currentSlides = 0;
  $totalControls = round(($totalSlides + 1) / 3);

  for ($i=0; $i < $totalControls; $i++) { 
    if ($i == 0) {
      echo '<button type="button" data-bs-target="#idslider" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>';
    } else {
      echo '<button type="button" data-bs-target="#idslider" data-bs-slide-to="'.$i.'" aria-label="Slide '.($i+1).'" class="bg-dark"></button>';
    }
  }
?>

            </div>
            <div class="carousel-inner">

              <?php

  for ($i=0; $i < $totalControls; $i++) {
    
    if ($currentSlides < 3) {
    echo '<div class="carousel-item active mb-5 text-center">';
    } else {
      echo '<div class="carousel-item mb-5 text-center">';
    }
           echo '<div class="d-md-inline-flex">';
           
    for ($j=0; $j < 3 && $currentSlides < $totalSlides; $j++) {
      echo '
      <div class="card text-white me-3 ms-5"style="width: 18rem;">
        <img src="./imagenes/2.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
      ';
      $currentSlides++;
    }

    echo '</div></div>';
  }
?>

            </div>
          </div>
        </div>
      </div>


  </section>



  <footer class="p-0">
    <section class="bg-pag">
      <hr>
      <div class="container">
        <div class="row text-md-left justify-content-center p-0">
          <div class="col-md-6 col-xl-3 col-xxl-4 mt-3"><a href="index.html"><img class="img-responsive"
                src="imagenes/2.jpg" alt="" width="229" height="58" /></a>
            <p class="text-white">
              Nos mantenemos fieles a los mismos principios sobre los que se fundó nuestra empresa hace más de 30 años,
              brindar servicios superiores a nuestros clientes.</p>
          </div>

          <div class="col-sm-6 col-md-3 col-xl-2 col-lg-3 mt-3"><span class="text-white">Informacion</span>
            <ul class="p-3">
              <li><a href="#index" class="fo">Home</a></li>
              <li><a href="#servicios" class="fo">Arma tu pc</a></li>
              <li><a href="#contacto" class="fo">Productos</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-xl-2 col-lg-5 mt-3">
            <div><span class="text-white">Contactanos</span>
              <ul class="p-2">
                <li>
                  <div>
                    <div>
                      <i class="fa-solid fa-map-pin text-white me-1"></i>
                      <a class="fo" href="https://goo.gl/maps/vGBARrfmRUpUCmhe7">Av.Corrientes 2037<br
                          class="d-none d-md-block">,CABA</a></div>
                  </div>
                </li>
                <li>
                  <div>
                    <div>
                      <i class="fa-solid fa-phone text-white me-1"></i>
                      <a class="fo" href="tel:#">4222-7525</a></div>
                  </div>
                </li>
                <li>
                  <div>
                    <div>
                      <i class="h4 fa-brands fa-whatsapp text-white me-1"></i>
                      <a class="fo"
                        href="https://wa.me/541123257933/?text=Hola%20,%20queria%20hacer%20una%20consulta%20sobre%20un%20problema%20que%20tiene%20mi%20auto">11-5759-0222</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div>
                    <div>
                      <i class="fa-solid fa-envelope text-white me-1"></i>
                      <a class="fo" href="mailto:dhelpuente@gmail.com">info@gmail.com</a></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 col-xxl-2 col-lg-5">
            <div class="text-white mt-3"><span>Seguinos</span>
              <ul class="p-2">
                <li>
                  <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram h4 redes text-blanco"></i></a>
                  <a href="https://www.facebook.com/"><i
                      class="fa-brands fa-facebook-f  ms-2 h4 redes text-blanco"></i></a>
                  <a href="https://www.twitch.tv/"><i class="fa-brands fa-twitch ms-2 h4 redes text-blanco"></i></a>

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-25 bg-pag2">
      <div class="container">
        <div class="row align-items-md-center row-10 justify-content-center">
          <div class="col-md-8 text-center">
            <p class="small-xs text-white">Copyright <span class="copyright-year"></span> All rights reserved by .
            </p>
          </div>
        </div>
      </div>
    </section>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>
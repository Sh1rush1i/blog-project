<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asep Aziz Fauzi</title>
    @vite(['resources/css/style.css', 'resources/js/index.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <section class="sub-header">
        <nav class="reveal">
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li class="menu"><a href="">MENU</a></li>
                    <li><a href="{{ route('index') }}">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}">Tentang</a></li>
                    <li><a href="{{ route('tulisan') }}">Tulisan</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1 class="reveal">Tentang Saya</h1>
    </section>

    {{-- <!tentang> --}}
    <section class="tentang reveal">
      <div class="tentang-container">
        <img class="" src="https://placehold.co/1200"/>
        <div class="tentang-disc-container">
          <h1>Tentang Saya</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
          <br><br>
          Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>
        </div>
      </div>
    </section>

    {{-- <!Copyright> --}}
    <section class="footer reveal">
      <p>Quote(?)</p>
      <div class="icons">
        <a href=""
          ><i class="fa fa-facebook"></i
        ></a>
        <a href=""><i class="fa fa-twitter"></i></a>
        <a href=""
          ><i class="fa fa-instagram"></i
        ></a>
        <a href=""><i class="fa fa-linkedin"></i></a>
      </div>
      <p>
        <i class="fa-solid fa-at"></i> Asep Aziz Fauzi
      </p>
    </section>

    <script
      src="https://kit.fontawesome.com/d37debc9e5.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{ mix('resources/js/index.js') }}"></script>
  </body>
</html>

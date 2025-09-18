<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Project</title>
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
        <h1 class="reveal">Tulisan Saya</h1>
    </section>

    {{-- <!artikel detail> --}}
    <section class="base-section">
      <div class="details-container reveal">
        <div>
          <h1>Tulisan Terbaru</h1>
          <p>Berikut adalah beberapa artikel terbaru dari saya.</p>
        </div>
        <div class="artikel-tanggal">
            <i class="fa-solid fa-calendar"></i>
            <p>1 Januari 2023</p>
        </div>
      </div>
      <div class="carousel reveal">
        <div class="carousel-inner">

          <div class="carousel-item active">
            <img src="https://placehold.co/1366x480" alt="Gambar Artikel" />
          </div>
          
          <div class="carousel-item">
            <img src="https://placehold.co/1366x480" alt="Gambar Artikel" />
          </div>
          <div class="carousel-item">
            <img src="https://placehold.co/1366x480" alt="Gambar Artikel" />
          </div>
        </div>

        <!-- Navigator -->
        <button class="carousel-nav prev">‹</button>
        <button class="carousel-nav next">›</button>

        <!-- Indicators -->
        <div class="carousel-indicators">
          <button class="indicator active" data-slide-to="0"></button>
          <button class="indicator" data-slide-to="1"></button>
          <button class="indicator" data-slide-to="2"></button>
        </div>
      </div>

      <!--Author-->
      <div class="article-author reveal">
        <div class="author-visual">
          <span class="quote-mark left">“</span>
          <span class="oval">
            <img src="https://placehold.co/90x90" alt="">
          </span>
          <span class="quote-mark right">”</span>
        </div>
        <div class="author-text">
          <h3 class="author-name">John Doe</h3>
          <a class="author-role">Penulis</a>
        </div>
      </div>

      <!--Konten tulisan-->
      <div class="article-layout reveal">
        <!-- Kolom kiri: isi artikel -->
        <div class="article-main">
          <p>
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat...Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
          </p>
        </div>

        <!-- Kolom kanan: card artikel lainnya -->
        <aside class="article-sidebar">
          <h3 class="other-tulisan">Tulisan lain saya :</h3>
          <div class="artikel-col reveal">
            <img src="https://placehold.co/1000" alt="Thumbnail Artikel">
            <div class="artikel-tanggal">
              <i class="fa-solid fa-calendar"></i>
              <p>1 Januari 2023</p>
            </div>
            <h3>Tulisan satu</h3>
          </div>
          <div class="artikel-col reveal">
            <img src="https://placehold.co/1000" alt="Thumbnail Artikel">
            <div class="artikel-tanggal">
              <i class="fa-solid fa-calendar"></i>
              <p>1 Januari 2023</p>
            </div>
            <h3>Tulisan satu</h3>
          </div>
          <div class="artikel-col reveal">
            <img src="https://placehold.co/1000" alt="Thumbnail Artikel">
            <div class="artikel-tanggal">
              <i class="fa-solid fa-calendar"></i>
              <p>1 Januari 2023</p>
            </div>
            <h3>Tulisan satu</h3>
          </div>
        </aside>
      </div>
    </section>

    <div class="bottom-navigation">
      <!-- Kiri -->
      <a href="{{ route('index') }}" class="nav-left">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Beranda</span>
      </a>
      <!-- Tengah (dekorasi) -->
      <div class="nav-center">
        <span class="quote-mark left">“</span>
        <span class="quote-mark right">”</span>
      </div>
      <!-- Kanan -->
      <a href="{{ route('tulisan') }}" class="nav-right">
        <span>Tulisan Lain</span>
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>

    {{-- <!Copyright> --}}
    <section class="footer reveal" style="margin-top: 40px;">
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
        <i class="fa-solid fa-at"></i> Nama Penulis
      </p>
    </section>

    <script
      src="https://kit.fontawesome.com/d37debc9e5.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{ mix('resources/js/index.js') }}"></script>
  </body>
</html>

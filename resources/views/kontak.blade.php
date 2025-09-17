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
        <h1 class="reveal">Hubungi Saya</h1>
    </section>

    {{-- <!hubungi> --}}
    <section class="hubungi2 reveal">
      <div class="hubungi-col">
          <div>
              <i class="fa fa-home"></i>
              <span>
                  <h5>Jl. ABC, DEF nagunan, No.69</h5>
                  <p>Bandung, Jawa Barat, Indonesia</p>
              </span>
          </div>
          <div>
              <i class="fa fa-phone"></i>
              <span>
                  <h5>+62 14045</h5>
                  <p>Senin sampai dengan Jumat, 7 AM - 16 PM</p>
              </span>
          </div>
          <div>
              <i class="fa fa-envelope-o"></i>
              <span>
                  <h5>Emailku@blablabla.com</h5>
                  <p>Email saya jika berkeperluan</p>
              </span>
          </div>
        </div>
    </section>

    {{-- <!lokasi> --}}
    <section class="lokasi reveal">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3048378039152!2d107.62813615093775!3d-6.9733164949375785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sTelkom%20University!5e0!3m2!1sen!2sid!4v1653735876483!5m2!1sen!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

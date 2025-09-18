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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="header">
        <nav class="reveal">
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li class="menu"><a href="">MENU</a></li>
                    <li><a href="index.html">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}">Tentang</a></li>
                    <li><a href="{{ route('tulisan') }}">Tulisan</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="text-box">
            <div class="reveal">
                <h1>Asep Aziz Fauzi</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae
                    pellentesque sem placerat.<br>In id cursus mi pretium tellus duis convallis.
                </p>
                <a href="{{ route('tulisan') }}" class="hero-btn">Tulisan Saya</a>
            </div>
        </div>
    </div>

    {{-- <!tentang> --}}
    <section class="tentang reveal">
        <div class="tentang-container">
            <img class="" src="https://placehold.co/1200" />
            <div class="tentang-disc-container">
                <h1>Tentang Saya</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque
                    sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna
                    tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada
                    lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora
                    torquent per conubia nostra inceptos himenaeos.
                    <br><br>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae
                    pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed
                    diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl
                    malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad
                    litora torquent per conubia nostra inceptos himenaeos.
                </p>
                <div class="btn-read">
                    <a href="{{ route('tentang') }}">Kenali saya</a>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </section>

    {{-- <!artikel terbaru> --}}
    <section class="latest-article reveal">
        <h1>Tulisan Terbaru</h1>
        <p>Berikut adalah beberapa artikel terbaru dari saya.</p>
        @if ($posts->isNotEmpty())
            <div class="artikel-card">
                <img src="{{ asset('storage/' . $posts->sortByDesc('created_at')->first()->picture) }}"
                    alt="Artikel Terbaru" />
                <div class="gradient-overlay"></div>
                <div class="artikel-overlay">
                    <div class="artikel-tanggal">
                        <i class="fa-solid fa-calendar"></i>
                        <p>{{ $posts->sortByDesc('created_at')->first()->created_at->format('d F Y') }}</p>
                    </div>
                    <h1>{{ $posts->sortByDesc('created_at')->first()->title }}</h1>
                    <p style="white-space: pre-wrap">{{ $posts->sortByDesc('created_at')->first()->content }}</p>
                </div>
            </div>
        @else
            <div class="artikel-card kosong">
                <p>Belum ada artikel terbaru.</p>
            </div>
        @endif
    </section>

    {{-- <!artikel> --}}
    <section class="artikel reveal">
        <h1>Tulisan Saya</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
        @if ($posts->isNotEmpty())
            <div class="artikel-row">
                @foreach ($posts->sortByDesc('created_at')->take(3) as $post)
                    <div class="artikel-col">
                        <img src="{{ asset('storage/' . $post->picture) }}" />
                        <div class="artikel-tanggal">
                            <i class="fa-solid fa-calendar"></i>
                            <p>{{ $post->created_at->format('d F Y') }}</p>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <p style="white-space: pre-wrap">
                            {{ $post->content }}
                        </p>
                        <div class="artikel-baca">
                            <a
                                href="{{ route('posts.show', [
                                    'slug' => $post->slug,
                                    'stamp' => $post->created_at->format('YmdHi'),
                                ]) }}">
                                Baca selengkapnya</a>
                            <i class="fa-brands fa-readme"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="artikel-row kosong">
                <p>Belum ada artikel yang tersedia.</p>
            </div>
        @endif
        <div class="btn-read">
            <a href="{{ route('tulisan') }}">Muat lebih banyak</a>
            <i class="fa-solid fa-arrow-right"></i>
        </div>
    </section>

    {{-- <!Ngajak> --}}
    <section class="about-me reveal">
        <h1>Kata-Kata Bisa Mengubah Cara Kita Melihat Dunia
            <br> Temukan Makna Di Setiap Kata
        </h1>
        <a href="{{ route('kontak') }}" class="hubungi">HUBUNGI SAYA</a>
    </section>

    {{-- <!Copyright> --}}
    <section class="footer reveal">
        <p>Quote(?)</p>
        <div class="icons">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
        </div>
        <p>
            <i class="fa-solid fa-at"></i> Asep Aziz Fauzi
        </p>
    </section>

    <script src="https://kit.fontawesome.com/d37debc9e5.js" crossorigin="anonymous"></script>
    <script src="{{ mix('resources/js/index.js') }}"></script>
</body>

</html>

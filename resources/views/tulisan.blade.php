<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asep Aziz Fauzi</title>
    @vite(['resources/css/style.css', 'resources/js/index.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
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

    {{-- <!artikel terbaru> --}}
    <section class="latest-article reveal">
        <h1>Tulisan Terbaru</h1>
        <p>Berikut adalah beberapa artikel terbaru dari saya.</p>
        <div class="artikel-card">
            <img src="{{ asset('storage/' . $posts->first()->picture) }}" alt="Artikel Terbaru" />
            <div class="gradient-overlay"></div>
            <div class="artikel-overlay">
                <div class="artikel-tanggal">
                    <i class="fa-solid fa-calendar"></i>
                    <p>{{ $posts->first()->created_at->format('d F Y') }}</p>
                </div>
                <h1>{{ $posts->first()->title }}</h1>
                <p>{{ $posts->first()->content }}</p>
            </div>
        </div>
    </section>

    {{-- <!artikel> --}}
    <section class="artikel reveal">
        <h1>Tulisan Saya</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
        <div class="artikel-row">
            @if ($posts->count() > 1)
                @foreach ($posts->skip(1) as $post)
                    <div class="artikel-col">
                        <img src="{{ asset('storage/' . $post->picture) }}" />
                        <div class="artikel-tanggal">
                            <i class="fa-solid fa-calendar"></i>
                            <p>{{ $post->created_at->format('d F Y') }}</p>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <p>
                            {!! nl2br(e($post->content)) !!}
                        </p>
                        <div class="artikel-baca">
                            <a
                                href="{{ route('posts.show', [
                                    'slug' => $post->slug,
                                    'stamp' => $post->created_at->format('YmdHi'),
                                ]) }}">Baca
                                selengkapnya</a>
                            <i class="fa-brands fa-readme"></i>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Tidak ada artikel lain yang tersedia.</p>
            @endif

        </div>
    </section>

    {{-- <!Copyright> --}}
    <section class="footer reveal" style="margin-top: 40px;">
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="description" content="">
    @vite(['resources/css/admin.style.css'])
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-family-poppins flex">
    <!-- Modal Tambah Tulisan -->
    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl p-6 relative modal-enter">
            <button id="closeTambahModal" class="absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full hover:bg-red-600 focus:outline-none">
                &times;
            </button>
            <h2 class="text-xl font-bold mb-4">Tambah Tulisan</h2>
            <form class="space-y-4">
            <div>
                <label class="block font-medium mb-1">Gambar</label>
                <div id="previewContainer" class="flex space-x-2 mb-2 overflow-x-auto"></div>
                <input id="imageInput" type="file" multiple accept="image/*" class="w-full border rounded p-2" />
            </div>
            <div>
                <label class="block font-medium mb-1">Judul</label>
                <input type="text" class="w-full border rounded p-2" placeholder="Masukkan judul" />
            </div>
            <div>
                <label class="block font-medium mb-1">Tulisan</label>
                <textarea class="w-full border rounded p-2" rows="4" placeholder="Tulis isi di sini..."></textarea>
            </div>
            <div>
                <label class="block font-medium mb-1">Tanggal</label>
                <input type="date" class="w-full border rounded p-2" />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Tulisan</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Tulisan -->
    <div id="modalEdit" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl p-6 relative modal-enter">
            <button id="closeEditModal" class="absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full hover:bg-red-600 focus:outline-none">
                &times;
            </button>
            <h2 class="text-xl font-bold mb-4">Edit Tulisan</h2>
            <form id="editForm" class="space-y-4">
            <div>
                <label class="block font-medium mb-1">Gambar</label>
                <div id="editPreviewContainer" class="flex space-x-2 mb-2 overflow-x-auto"></div>
                <input id="editImageInput" type="file" multiple accept="image/*" class="w-full border rounded p-2" />
            </div>
            <div>
                <label class="block font-medium mb-1">Judul</label>
                <input id="editTitleInput" name="title" type="text" class="w-full border rounded p-2" />
            </div>
            <div>
                <label class="block font-medium mb-1">Tulisan</label>
                <textarea id="editDescInput" name="description" class="w-full border rounded p-2" rows="4"></textarea>
            </div>
            <div>
                <label class="block font-medium mb-1">Tanggal</label>
                <input id="editDateInput" name="date" type="date" class="w-full border rounded p-2" />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>

            <!-- Tombol tambah Tulisan -->
            <button id="btnTambahModal"
                class="w-full bg-white cta-btn  py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center text-blue-500 hover:text-blue-700">
                <i class="fas fa-plus mr-3"></i> Tambah Tulisan
            </button>

        </div>
        
        <nav class="text-white text-base font-semibold pt-3">
            <a href="" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fa-solid fa-grip mr-3"></i>
                Dashboard
            </a>
        </nav>
    </aside>

    <!-- Konten utama -->
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Header Desktop -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div class="relative w-1/2 flex justify-end">
                <!-- Tombol avatar -->
                <button id="avatarBtn"
                    class="relative z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://placehold.co/100" alt="User Avatar">
                </button>

                <!-- Dropdown -->
                <div id="dropdownMenu" class="absolute right-0 mt-14 w-40 bg-white rounded-lg shadow-lg py-2 hidden">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> Log Out
                            </a>
                    </form>
                </div>
            </div>
        </header>

        <!-- Konten -->
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black font-bold pb-2">Dashboard</h1>
                <h3 class="text-black">Karya Tulis saya</h3>
                <div class="flex flex-wrap mt-6 mb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                        
                        {{-- Tulisan 1 --}}
                        @foreach ($posts as $post)
                        <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                            @php
                                    $firstImage = $images->where('post_id', $post->id)->first();
                            @endphp
                            <img src="{{ asset('storage/' . $firstImage->path ?? 'image/placeholder.png') }}" alt="Thumbnail" class="card-img w-full h-48 object-cover"/>
                            <div class="p-4">
                                <h2 class="card-title text-lg font-semibold text-gray-800 mb-2 truncate">
                                {{ $post->title }}
                                </h2>
                                <p class="card-desc text-gray-600 text-sm line-clamp-3">
                                {{ $post->content }}
                                </p>
                                <p class="card-date text-xs text-gray-400 mt-3">{{ $post->date }}</p>
                            </div>

                            <div class="p-4 border-t flex items-center gap-2">
                                <button class="editBtn bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                                </button>
                                <button class="deleteBtn bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d37debc9e5.js" crossorigin="anonymous"></script>
    <script src="{{ mix('resources/js/admin.js') }}"></script>
</body>
</html>
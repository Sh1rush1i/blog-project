<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap');

        .font-family-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }

        /* Animasi modal */
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .modal-exit {
            opacity: 1;
            transform: scale(1);
        }

        .modal-exit-active {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-poppins flex">

    <!-- Sidebar -->
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>

            <!-- Tombol buka modal -->
            <button id="openModal"
                class="w-full bg-white cta-btn  py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center text-blue-500 hover:text-blue-700">
                <i class="fas fa-plus mr-3"></i> Tambah Tulisan
            </button>

            <!-- Modal -->
            <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl p-6 relative modal-enter">
                    <!-- Tombol Close -->
                    <button id="closeModal"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

                    <h2 class="text-xl font-bold mb-4">Tambah Tulisan</h2>

                    <form class="space-y-4" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Upload Gambar -->
                        <div>
                            <label class="block font-medium mb-1">Gambar</label>

                            <!-- Container preview -->
                            <div id="previewContainer" class="flex space-x-2 mb-2 overflow-x-auto"></div>

                            <!-- Input file -->
                            <input name="image[]" id="image" type="file" multiple accept="image/*"
                                class="w-full border rounded p-2">
                        </div>

                        <!-- Judul -->
                        <div>
                            <label class="block font-medium mb-1">Judul</label>
                            <input type="text" id="title" name="title" class="w-full border rounded p-2"
                                placeholder="Masukkan judul">
                        </div>

                        <!-- Tulisan -->
                        <div>
                            <label class="block font-medium mb-1">Tulisan</label>
                            <textarea id="content" name="content" class="w-full border rounded p-2" rows="4"
                                placeholder="Tulis isi di sini..."></textarea>
                        </div>

                        <!-- Tanggal -->
                        <div>
                            <label class="block font-medium mb-1">Tanggal</label>
                            <input id="date" name="date" type="date" class="w-full border rounded p-2">
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah
                                Tulisan</button>
                        </div>
                    </form>
                </div>
            </div>
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
                        <!-- Card -->
                        @foreach ($posts as $post)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                @php
                                    $firstImage = $images->where('post_id', $post->id)->first();
                                @endphp
                                <img src="{{ asset('storage/' . $firstImage->path ?? 'image/placeholder.png') }}"
                                    alt="Thumbnail" class="w-full h-48 object-cover">

                                <div class="p-4">
                                    <h2 class="text-lg font-semibold text-gray-800 mb-2 truncate">
                                        {{ $post->title }}
                                    </h2>
                                    <p class="text-gray-600 text-sm line-clamp-3">
                                        {{ $post->content }}
                                    </p>
                                    <p class="text-xs text-gray-400 mt-3">{{ date('j F Y', strtotime($post->date)) }}</p>
                                </div>

                                <div class="p-4 border-t flex items-center gap-2">
                                    <button
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 editBtn"
                                        data-id="{{ $post->id }}" data-title="{{ $post->title }}"
                                        data-desc="{{ $post->content }}" data-date="{{ $post->date }}"
                                        data-image="{{ asset('storage/' . $firstImage->path ?? 'image/placeholder.png') }}">
                                        Edit
                                    </button>

                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 deleteBtn"
                                        data-id="{{ $post->id }}">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        @endforeach

                    </div>
            </main>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d37debc9e5.js" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const imageInput = document.getElementById("imageInput");
            const previewContainer = document.getElementById("previewContainer");

            imageInput.addEventListener("change", () => {
                // Kosongkan preview setiap kali pilih gambar baru
                previewContainer.innerHTML = "";

                Array.from(imageInput.files).forEach(file => {
                    if (!file.type.startsWith("image/")) return;

                    const reader = new FileReader();
                    reader.onload = e => {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.className = "w-20 h-20 object-cover rounded border";
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });

            const avatarBtn = document.getElementById("avatarBtn");
            const dropdownMenu = document.getElementById("dropdownMenu");

            avatarBtn.addEventListener("click", () => {
                dropdownMenu.classList.toggle("hidden");
            });

            // Klik di luar dropdown untuk menutup
            document.addEventListener("click", (e) => {
                if (!avatarBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        });


        const modal = document.getElementById("myModal");
        const modalContent = modal.querySelector("div");
        const closeModal = document.getElementById("closeModal");
        const modalTitle = modal.querySelector("h2");
        const form = modal.querySelector("form");

        // Input di form
        const imageInput = document.getElementById("imageInput");
        const titleInput = form.querySelector('input[type="text"]');
        const descInput = form.querySelector('textarea');
        const dateInput = form.querySelector('input[type="date"]');
        const submitBtn = form.querySelector('button[type="submit"]');

        function showModal() {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            requestAnimationFrame(() => {
                modalContent.classList.remove("modal-enter");
                modalContent.classList.add("modal-enter-active");
            });
        }

        function hideModal() {
            modalContent.classList.remove("modal-enter-active");
            modalContent.classList.add("modal-exit-active");
            setTimeout(() => {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
                modalContent.classList.remove("modal-exit-active");
                modalContent.classList.add("modal-enter");
            }, 200);
        }

        closeModal.addEventListener("click", hideModal);
        modal.addEventListener("click", (e) => {
            if (e.target === modal) hideModal();
        });

        // Event untuk tombol Edit
        document.querySelectorAll(".editBtn").forEach(btn => {
            btn.addEventListener("click", () => {
                // Ubah judul modal
                modalTitle.textContent = "Edit Tulisan";

                // Prefill form dari data-* attribute
                titleInput.value = btn.dataset.title;
                descInput.value = btn.dataset.desc;
                dateInput.value = btn.dataset.date;

                // (Opsional) preview gambar lama
                const previewContainer = document.getElementById("previewContainer");
                previewContainer.innerHTML =
                    `<img src="${btn.dataset.image}" class="h-20 w-20 object-cover rounded">`;

                // Ubah teks tombol submit
                submitBtn.textContent = "Simpan Perubahan";

                showModal();
            });
        });

        // Event untuk tombol Tambah (misalnya id="openModal")
        document.getElementById("openModal").addEventListener("click", () => {
            modalTitle.textContent = "Tambah Tulisan";
            form.reset();
            document.getElementById("previewContainer").innerHTML = "";
            submitBtn.textContent = "Tambah Tulisan";
            showModal();
        });
    </script>
</body>

</html>

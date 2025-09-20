document.addEventListener("DOMContentLoaded", () => {
    // Dropdown Logout
    const avatarBtn = document.getElementById("avatarBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    avatarBtn.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (!avatarBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });

    // Modal Utility
    function createModal(modalId, closeBtnId) {
        const modal = document.getElementById(modalId);
        const content = modal.querySelector(".modal-enter");
        const close = document.getElementById(closeBtnId);

        function show() {
            modal.classList.replace("hidden", "flex");
            requestAnimationFrame(() =>
                content.classList.add("modal-enter-active")
            );
        }

        function hide() {
            content.classList.remove("modal-enter-active");
            content.classList.add("modal-exit-active");
            setTimeout(() => {
                modal.classList.replace("flex", "hidden");
                content.classList.remove("modal-exit-active");
            }, 200);
        }

        close.addEventListener("click", hide);
        modal.addEventListener("click", (e) => e.target === modal && hide());

        return { show, hide };
    }

    // Modal Tambah
    const { show: showTambahModal } = createModal(
        "modalTambah",
        "closeTambahModal"
    );
    let tambahFiles = [];

    document.getElementById("btnTambahModal").addEventListener("click", () => {
        document.getElementById("imageInput").value = "";
        tambahFiles = [];
        renderPreview("previewContainer", tambahFiles, "imageInput");
        showTambahModal();
    });

    document.getElementById("imageInput").addEventListener("change", () => {
        const input = document.getElementById("imageInput");
        const newFiles = Array.from(input.files);
        tambahFiles = tambahFiles.concat(newFiles);
        updateInputFile("imageInput", tambahFiles);
        renderPreview("previewContainer", tambahFiles, "imageInput");
    });

    // Modal Edit
    const { show: showEditModal } = createModal("modalEdit", "closeEditModal");
    let editFiles = [];

    document.querySelectorAll(".editBtn").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const card = e.currentTarget.closest(".card");
            if (!card) return;

            const id = card.querySelector('input[name="post_id"]')?.value || "";
            const title =
                card.querySelector(".card-title")?.textContent.trim() || "";
            const desc =
                card.querySelector(".card-desc")?.textContent.trim() || "";
            const dateText =
                card.querySelector(".card-date")?.textContent.trim() || "";
            const imgSrc = card.querySelector(".card-img")?.src || "";

            const isoDate = dateText
                ? new Date(dateText).toISOString().split("T")[0]
                : "";

            document.getElementById("editPostId").value = id;
            document.getElementById("editTitleInput").value = title;
            document.getElementById("editDescInput").value = desc;
            document.getElementById("editDateInput").value = isoDate;

            editFiles = [];

            if (imgSrc) {
                fetch(imgSrc)
                    .then((res) => res.blob())
                    .then((blob) => {
                        const file = new File([blob], "prev-img.jpg", {
                            type: blob.type,
                        });
                        editFiles.push(file);
                        updateInputFile("editImageInput", editFiles);
                        renderPreview(
                            "editPreviewContainer",
                            editFiles,
                            "editImageInput"
                        );
                    });
            }

            showEditModal();
        });
    });

    document.getElementById("editImageInput").addEventListener("change", () => {
        const input = document.getElementById("editImageInput");
        const newFiles = Array.from(input.files);
        editFiles = editFiles.concat(newFiles);
        updateInputFile("editImageInput", editFiles);
        renderPreview("editPreviewContainer", editFiles, "editImageInput");
    });

    // Reusable Preview Renderer
    function renderPreview(containerId, filesArray, inputId) {
        const container = document.getElementById(containerId);
        container.innerHTML = "";

        filesArray.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement("div");
                wrapper.className = "relative w-32 h-32";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-full h-full object-cover rounded-lg border";

                const removeBtn = document.createElement("button");
                removeBtn.innerHTML = "&times;";
                removeBtn.className =
                    "absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full text-sm flex items-center justify-center hover:bg-red-600 focus:outline-none";

                removeBtn.addEventListener("click", () => {
                    filesArray.splice(index, 1);
                    updateInputFile(inputId, filesArray);
                    renderPreview(containerId, filesArray, inputId);
                });

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                container.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    // Sync Input File
    function updateInputFile(inputId, filesArray) {
        const input = document.getElementById(inputId);
        const dataTransfer = new DataTransfer();
        filesArray.forEach((file) => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }
});

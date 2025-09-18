// Navbar Toggle Menu
const navLinks = document.getElementById("navLinks");

function showMenu() {
    navLinks.style.right = "0";
}

function hideMenu() {
    navLinks.style.right = "-200px";
}

// Fade in Animation
(() => {
    const reveals = document.querySelectorAll(".reveal");
    if (!reveals.length) return;

    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        reveals.forEach((el) => el.classList.add("is-visible"));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                entry.target.classList.toggle(
                    "is-visible",
                    entry.isIntersecting
                );
            });
        },
        {
            threshold: 0.15,
            rootMargin: "0px 0px -10% 0px",
        }
    );

    reveals.forEach((el) => observer.observe(el));
})();

// Carousel
document.addEventListener("DOMContentLoaded", () => {
    const inner = document.querySelector(".carousel-inner");
    const items = Array.from(document.querySelectorAll(".carousel-item"));
    const prevBtn = document.querySelector(".carousel-nav.prev");
    const nextBtn = document.querySelector(".carousel-nav.next");
    const dots = Array.from(
        document.querySelectorAll(".carousel-indicators .indicator")
    );
    let currentIndex = 0;

    function updateCarousel() {
        inner.style.transform = `translateX(-${currentIndex * 100}%)`;
        items.forEach((item, i) =>
            item.classList.toggle("active", i === currentIndex)
        );
        dots.forEach((dot, i) =>
            dot.classList.toggle("active", i === currentIndex)
        );
    }

    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
    });

    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
    });

    dots.forEach((dot) => {
        dot.addEventListener("click", () => {
            currentIndex = parseInt(dot.dataset.slideTo, 10);
            updateCarousel();
        });
    });

    // Autoplay carousel
    const autoplayInterval = 5000; // durasi per slide (ms)
    let autoplayId = setInterval(() => nextBtn.click(), autoplayInterval);

    // Pause hover
    const carouselEl = document.querySelector(".carousel");
    carouselEl.addEventListener("mouseenter", () => clearInterval(autoplayId));
    carouselEl.addEventListener("mouseleave", () => {
        autoplayId = setInterval(() => nextBtn.click(), autoplayInterval);
    });

    // Share WA
    const rootLink = "https://example.com"; // ganti dengan link root kamu
    const judul = document.getElementById("judul").innerText;
    const konten = document.getElementById("konten").innerText;

    // Bold judul
    const pesan = `*${judul}*\n\n${konten}\n\nBaca lebih banyak di ${rootLink}`;
    const encodedPesan = encodeURIComponent(pesan);

    // Deteksi device
    const isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    const waBase = isMobile
        ? "https://wa.me/?text="
        : "https://web.whatsapp.com/send?text=";

    document.getElementById("wa-share-btn").href = waBase + encodedPesan;
});

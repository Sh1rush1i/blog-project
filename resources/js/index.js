//Navbar Toggle Menu
var navLinks = document.getElementById("navLinks");
function showMenu() {
    navLinks.style.right = "0";
}

function hideMenu() {
    navLinks.style.right = "-200px";
}

//Reveal Animation
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

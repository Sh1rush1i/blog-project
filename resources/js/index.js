var navLinks = document.getElementById("navLinks");
function showMenu() {
    navLinks.style.right = "0";
}

function hideMenu() {
    navLinks.style.right = "-200px";
}

document.addEventListener("DOMContentLoader", () => {
    document.querySelectorAll(".artikel-col p").forEach((p) => {
        const txt = p.textContent.trim();
        if (txt.length > 140) {
            p.textContent = txt.slice(0, 140) + "…";
        }
    });
});

(() => {
    const nodes = document.querySelectorAll(".reveal");
    if (!nodes.length) return;

    // Respect reduced motion
    const reduce = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;
    if (reduce) {
        nodes.forEach((el) => el.classList.add("is-visible"));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    // Optional per-element controls:
                    if (el.dataset.revealDuration) {
                        el.style.setProperty(
                            "--reveal-duration",
                            el.dataset.revealDuration
                        );
                    }
                    el.style.transitionDelay = el.dataset.revealDelay || "0ms";
                    el.classList.add("is-visible");
                    observer.unobserve(el);
                }
            });
        },
        {
            root: null,
            threshold: 0.15, // ~15% visible
            rootMargin: "0px 0px -10% 0px", // start a bit before it fully enters
        }
    );

    nodes.forEach((el) => observer.observe(el));
})();

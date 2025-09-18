import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/style.css",
                "resources/css/admin.style.css",
                "resources/js/app.js",
                "resources/js/index.js",
                "resources/js/admin.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

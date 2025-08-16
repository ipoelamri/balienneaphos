const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    dark: "#111827", // Sebelumnya gray-900
                    medium: "#1f2937", // Sebelumnya gray-800
                },
                accent: {
                    DEFAULT: "#4f46e5", // Sebelumnya indigo-600
                    hover: "#6366f1", // Sedikit lebih terang dari indigo-500 untuk hover
                },
                text: {
                    light: "#ffffff", // Sebelumnya white
                    muted: "#d1d5db", // Sebelumnya gray-300
                    subtle: "#9ca3af", // Sebelumnya gray-400
                },
                button: {
                    primary: "#100d4b", // Sebelumnya indigo-600
                    secondary: "#ffffff",
                    dark: "#000000",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};

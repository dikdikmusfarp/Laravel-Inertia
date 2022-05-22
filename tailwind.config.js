const defaultTheme = require('tailwindcss/defaultTheme');

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
                poppins: "Poppins, sans-serif",
                raleway: "Raleway, sans-serif",
                bscript: "Bad Script, cursive",
            },
            colors: {
                dark: "#090811",
                yello: "#F9C85A",
                "deep-yello": "#564318",
                "nardo-gray": "#B6B1DE",
                "dark-purple": "#2D1959",
                pinkly: "#F2418F",
                "deep-green": "#2F3A1C",
                "lemon-green": "#C7FA76",
                "input-text": "#E4E1F5",
                "placeholder-text": "#8B87A3",
                "form-bg": "#5A576F",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};

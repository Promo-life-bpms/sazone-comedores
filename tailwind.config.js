/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            /* {
                mytheme: {
                    "primary": "#015a77",
                },
            } */,
            "light",
            "dark",
        ],
    },
};

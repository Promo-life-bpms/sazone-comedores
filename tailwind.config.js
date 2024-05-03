/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js", "node_modules/preline/dist/*.js"],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui"), require('preline/plugin')],
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#015a77",
                    secondary: "teal",
                },
            }
        ],
    },
};

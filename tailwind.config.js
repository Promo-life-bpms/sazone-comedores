/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
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

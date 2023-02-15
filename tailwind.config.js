/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#00a6f2",
            },
            backgroundColor: {
                primary: "#00a6f2",
                gray: "#f7f7f7",
                white: "#ffffff",
                black: "#000000",
            },
            fontFamily: {
                sans: ["Inter", "sans-serif"],
                hanuman: ["Hanuman", "sans-serif"],
            },
            fontWeight: {
                light: 300,
                normal: 400,
                medium: 500,
                bold: 700,
            },
        },
    },
    plugins: [],
};
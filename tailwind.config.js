/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#00a6f2",
                white: "#ffffff",
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
            boxShadow: {
                border: "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px",
            },
        },
    },
    plugins: [],
};
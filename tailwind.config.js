/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            width: {
                "5/100": "5%",
                "10/100": "10%",
                "15/100": "15%",
                "20/100": "20%",
                "25/100": "25%",
                "30/100": "30%",
                "35/100": "35%",
                "40/100": "40%",
                "45/100": "45%",
                "50/100": "50%",
                "95/100": "95%",
                "23": "23rem",
            },
            colors: {
                primary: "#e12923",
            },
            backgroundColor: {
                primary: "#e12923",
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
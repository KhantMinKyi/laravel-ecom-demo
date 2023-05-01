/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                Raleway: "Raleway",
                RalewayThin: "RalewayThin",
                RalewayBold: "RalewayBold",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};

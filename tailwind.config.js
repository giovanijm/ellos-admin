/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            colors: {
                green: {
                    100: '#f0fff4',
                    200: '#c6f6d5',
                    300: '#9ae6b4',
                    400: '#68d391',
                    500: '#48bb78',
                    600: '#38a169',
                    700: '#2f855a',
                    800: '#276749',
                    900: '#22543d',
                  },
            },
        }
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("flowbite/plugin"),
        require("preline/plugin"),
    ],
}

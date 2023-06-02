const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        "./resources/**/*.js"
    ],
    theme: {
        container: {
            center: true,
        },
        extend: {
            fontFamily: {
                sans: ['PT Sans', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '1/2': '50%',
            },
            colors: {
                'orange': colors.orange
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}


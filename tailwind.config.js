const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        colors: {
            ...colors,
            black: '#000',
            white: '#fff',

            transparent: 'transparent',
            current: 'currentColor'
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
        },
    },

    plugins: [
        require('@tailwindcss/typography')
    ],
};

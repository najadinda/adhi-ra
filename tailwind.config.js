import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#599961',
                secondary: '#00610B ',
                white: '#fff',
                black: '#000',
            }
        },
    },
    plugins: [
        require('daisyui'),
    ],
    daisyui: {
        themes: ["light"], // Paksa menggunakan theme light
      },
};

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
            dropShadow: {
                'custom': '-4px 4px 9px rgba(0, 0, 0, 0.25)',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
                lexend: ['Lexend', 'sans-serif'],
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

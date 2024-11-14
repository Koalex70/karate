import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'screen-front': '#D9D9D9',
            },
            animation: {
                'loop-scroll': "loop-scroll 50s linear infinite"
            },
            keyframes: {
                "loop-scroll": {
                    from: {transform: "translateX(0)"},
                    to: {transform: "translateX(-100%)"},
                }
            }
        },
    },

    plugins: [forms],
};

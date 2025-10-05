import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#fff7ed',
                    100: '#ffedd5',
                    200: '#fed7aa',
                    300: '#fdba74',
                    400: '#fb923c',
                    500: '#ff6b35',
                    600: '#ea580c',
                    700: '#c2410c',
                    800: '#9a3412',
                    900: '#7c2d12',
                },
                vantroz: {
                    primary: '#ff6b35',
                    secondary: '#f7931e',
                    accent: '#ff8c42',
                    dark: '#000000',
                    'dark-secondary': '#1a1a1a',
                    'dark-tertiary': '#2a2a2a',
                    'gray-light': '#4a4a4a',
                    'gray-medium': '#6a6a6a',
                    white: '#ffffff',
                    'text-primary': '#000000',
                    'text-secondary': '#4a4a4a',
                }
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
            },
        },
    },

    plugins: [forms, typography],
};

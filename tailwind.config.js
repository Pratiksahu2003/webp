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
                    dark: '#ffffff',
                    'dark-secondary': '#fafafa',
                    'dark-tertiary': '#f5f5f5',
                    'gray-light': '#6b7280',
                    'gray-medium': '#9ca3af',
                    white: '#ffffff',
                    'text-primary': '#111827',
                    'text-secondary': '#6b7280',
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

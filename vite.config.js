import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/dashboard.css',
                'resources/js/app.js',
                'resources/js/dashboard.js',
                'resources/js/animations.js',
                'resources/js/interactions.js',
                'resources/js/navbar.js'
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: './postcss.config.js',
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    'vantroz-dashboard': ['resources/js/dashboard.js'],
                    'vantroz-animations': ['resources/js/animations.js'],
                    'vantroz-interactions': ['resources/js/interactions.js'],
                    'vantroz-navbar': ['resources/js/navbar.js'],
                },
            },
        },
        chunkSizeWarningLimit: 1000,
    },
    optimizeDeps: {
        include: ['alpinejs'],
    },
});

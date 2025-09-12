import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
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
                    'wezom-animations': ['resources/js/animations.js'],
                    'wezom-interactions': ['resources/js/interactions.js'],
                    'wezom-navbar': ['resources/js/navbar.js'],
                },
            },
        },
        chunkSizeWarningLimit: 1000,
    },
    optimizeDeps: {
        include: ['alpinejs'],
    },
});

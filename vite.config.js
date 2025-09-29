import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    build: {
        outDir: 'public/build', // <-- correct folder for Laravel
        manifest: true,          // <-- ensure manifest.json is generated
        rollupOptions: {
            input: 'resources/js/app.js', // entry point
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

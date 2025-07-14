import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fullReload from 'vite-plugin-full-reload';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/web/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        fullReload([
            'resources/views/**/*.blade.php',
            'routes/**/*.php',
        ]),
    ],
    build: {
        minify: mode === 'production',
        sourcemap: mode !== 'production',
    },
});

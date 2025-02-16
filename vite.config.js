import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/municipio.js',
                'resources/js/app.js',
            ],
            refresh: true,
            assetUrl: 'https://mineria.gobernaciondecochabamba.bo', // Asegura URLs con HTTPS
        }),
    ],
    build: {
        outDir: 'public/build',
        manifest: true,
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[name].[hash].[ext]',
                chunkFileNames: 'assets/[name].[hash].js',
                entryFileNames: 'assets/[name].[hash].js',
            },
        },
    },
    server: {
        https: true,
        host: '0.0.0.0',
        port: 5173,
    },
});

import {
    defineConfig
} from 'vite';
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
        }),
    ],
    server: {
        https: true, // Activa HTTPS en el servidor de desarrollo
        host: '0.0.0.0', // Permite acceso desde cualquier IP
        port: 5173, // Puedes cambiarlo si lo necesitas
    }
});

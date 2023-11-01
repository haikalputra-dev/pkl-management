import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
=======
            input: ['resources/css/app.css', 'resources/js/app.js'],
>>>>>>> 66034a7ed665f48dbf765c368ec1449e1afd4618
            refresh: true,
        }),
    ],
});

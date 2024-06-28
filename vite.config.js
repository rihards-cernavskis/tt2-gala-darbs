import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    
    server: {
        hmr: {
             host: process.env.DDEV_HOSTNAME,
             protocol: 'wss'
        }
    },
    
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

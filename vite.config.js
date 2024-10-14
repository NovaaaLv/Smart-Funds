import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@images': path.resolve(__dirname, 'resources/assets/images'),
            '@icons': path.resolve(__dirname, 'resources/assets/icons'),
            '@components': path.resolve(__dirname, 'resources/js/Components'),
        },
    },
});

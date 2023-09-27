import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue({
            template:{
                transformAssetUrls:{
                    base: '/',
                    includeAbsolute: false,
                }
            },
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            // '@': path.resolve(__dirname, './src/assets')
        },
    },
});

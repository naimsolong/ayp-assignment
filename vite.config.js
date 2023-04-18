import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { svelte } from '@sveltejs/vite-plugin-svelte'
import sveltePreprocess from 'svelte-preprocess'
import dotenv from 'dotenv'

dotenv.config() // load env vars from .env

const host = process.env.VITE_APP_URL;
const port = process.env.VITE_PORT;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        svelte({
            preprocess: sveltePreprocess()
        })
    ],
    server: { 
        host, 
        hmr: { host }, 
        port: port, 
    }
});

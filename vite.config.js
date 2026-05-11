import { defineConfig } from 'vite'

export default defineConfig({
    build: {
        outDir: 'assets/dist',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                main: 'assets/src/js/main.js',
                style: 'assets/src/css/input.css'
            }
        }
    }
})
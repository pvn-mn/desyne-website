import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'assets/dist',
    assetsDir: '',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: 'assets/src/js/main.js',
      },
      output: {
        entryFileNames: 'main.js',
        assetFileNames: 'style.css',
      },
    },
  },
})
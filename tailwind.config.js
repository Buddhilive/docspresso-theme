/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '**/*.php',
    '**/*.html',
    '!**/node_modules/**',
    '!**/vendor/**',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#0073aa',
        secondary: '#005a87',
      }
    },
  },
  plugins: [],
}
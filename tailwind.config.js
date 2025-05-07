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
        primary: '#8B5CF6', // Purple-500
        secondary: '#7C3AED', // Purple-600
      }
    },
  },
  plugins: [],
}
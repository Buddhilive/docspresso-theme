/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: ['selector', '[data-theme="dark"]'],
  content: [
    './templates/**/*.html',
    './parts/**/*.html',
    './patterns/**/*.php',
    './functions.php',
    './*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        mono: [
          '"Geist Mono"',
          'ui-monospace',
          'SFMono-Regular',
          'Menlo',
          'Consolas',
          '"Liberation Mono"',
          'monospace',
        ],
      },
      colors: {
        primary: {
          50: '#fef3f0',
          100: '#fde8e3',
          200: '#f8cfc3',
          300: '#f0af9d',
          400: '#e28369',
          500: '#c65737',
          600: '#a7452a',
          700: '#8c3821',
          800: '#6e2d1c',
          900: '#4f2317',
          950: '#2d1610',
        },
      },
      maxWidth: {
        content: '75rem',
      },
      typography: () => ({
        DEFAULT: {
          css: {
            maxWidth: '65ch',
          },
        },
      }),
    },
  },
  plugins: [require('@tailwindcss/typography')],
}

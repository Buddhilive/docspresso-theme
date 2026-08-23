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
  safelist: [
    'wp-site-blocks',
    'wp-block-template-part',
    'docspresso-sticky-header',
    'docspresso-brand',
    'docspresso-site-logo',
    'docspresso-nav',
    'wp-block-site-logo',
    'wp-block-navigation',
    'wp-block-navigation__container',
    'wp-block-navigation__responsive-container',
    // Native blocks styled in input.css that aren't hardcoded in any
    // template/pattern file, so Tailwind's content scanner can't see them
    // — they're inserted dynamically via the block editor.
    'wp-block-quote',
    'wp-block-pullquote',
    'wp-block-table',
    'wp-block-list',
    'wp-block-image',
    'wp-block-gallery',
    'wp-block-embed',
    'wp-block-embed__wrapper',
    'alignfull',
    'is-style-stripes',
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
        neutral: {
          50: '#fbfaf9',
          100: '#f6f4f4',
          200: '#ebe7e5',
          300: '#d9d2ce',
          400: '#b3a59e',
          500: '#8f7a70',
          600: '#6f5f58',
          700: '#564943',
          800: '#3c332f',
          900: '#28221f',
          950: '#171412',
        },
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

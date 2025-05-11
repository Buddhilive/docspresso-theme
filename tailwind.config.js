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
      },
      typography: {
        DEFAULT: {
          css: {
            maxWidth: 'none',
            color: '#374151',
            lineHeight: '1.75',
            a: {
              color: '#8B5CF6',
              '&:hover': {
                color: '#7C3AED',
              },
            },
            'h1, h2, h3, h4, h5, h6': {
              color: '#111827',
              fontWeight: 'bold',
            },
            blockquote: {
              borderLeftColor: '#D8B4FE',
              backgroundColor: '#FAF5FF',
              padding: '1rem 1.5rem',
              borderRadius: '0 0.5rem 0.5rem 0',
            },
            code: {
              backgroundColor: '#F3F4F6',
              color: '#8B5CF6',
              fontWeight: '600',
              padding: '0.125rem 0.25rem',
              borderRadius: '0.25rem',
            },
          },
        },
        lg: {
          css: {
            fontSize: '1.125rem',
            lineHeight: '1.75',
          },
        },
      },
      aspectRatio: {
        'video': '16 / 9',
        'square': '1 / 1',
        'portrait': '3 / 4',
      },
    },
  },
  plugins: [
    // Add typography plugin if available
    function({ addUtilities }) {
      const newUtilities = {
        '.line-clamp-1': {
          overflow: 'hidden',
          display: '-webkit-box',
          '-webkit-box-orient': 'vertical',
          '-webkit-line-clamp': '1',
        },
        '.line-clamp-2': {
          overflow: 'hidden',
          display: '-webkit-box',
          '-webkit-box-orient': 'vertical',
          '-webkit-line-clamp': '2',
        },
        '.line-clamp-3': {
          overflow: 'hidden',
          display: '-webkit-box',
          '-webkit-box-orient': 'vertical',
          '-webkit-line-clamp': '3',
        },
        '.aspect-video': {
          'aspect-ratio': '16 / 9',
        },
        '.aspect-square': {
          'aspect-ratio': '1 / 1',
        },
      }
      addUtilities(newUtilities)
    }
  ],
}
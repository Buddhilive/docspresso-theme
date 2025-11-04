# DocsPresso Tech Blog WordPress Theme

## Project Overview

DocsPresso Tech Blog is a modern WordPress theme built specifically for tech blogs. It features full support for the WordPress block editor and is styled using Tailwind CSS. The theme provides a responsive design with accessibility considerations and a clean, modern aesthetic suitable for technical content.

### Key Features
- Built with Tailwind CSS for utility-first styling
- Full support for WordPress block editor (Gutenberg)
- Responsive design with mobile-first approach
- Accessibility-ready
- Custom logo support
- Post thumbnails support
- Modern typography using system fonts
- Theme JSON support for global styles
- Custom color palette with purple-based primary colors

### Technology Stack
- PHP (WordPress theme)
- Tailwind CSS (v3.3.0)
- JavaScript (for mobile menu and accessibility)
- WordPress theme API

## Directory Structure

```
docspresso-theme/
├── 404.php                 # 404 error page template
├── archive.php             # Archive page template
├── footer.php              # Footer section
├── front-page.php          # Front page template
├── functions.php           # Theme functions and setup
├── header.php              # Header section with navigation
├── index.php               # Main template file
├── page.php                # Static page template
├── single.php              # Single post template
├── style.css               # Theme information and basic styles
├── theme.json              # WordPress theme settings
├── assets/
│   ├── css/
│   │   ├── tailwind.css     # Source Tailwind CSS
│   │   ├── tailwind-output.css # Compiled Tailwind CSS
│   │   ├── editor-style.css # Editor styles
│   │   └── style.css        # Additional basic styles
│   └── js/
│       └── main.js          # JavaScript for mobile menu and accessibility
├── parts/                  # Unused in current version
├── template-parts/
│   ├── content-none.php     # No content template
│   ├── content-page.php     # Page content template
│   ├── content-single.php   # Single post content template
│   └── content.php          # General content template
├── LICENSE
├── README.md
├── package.json
├── package-lock.json
├── tailwind.config.js
└── .gitignore
```

## Building and Running

### Development Setup
1. Ensure you have Node.js installed on your system
2. Install the required dependencies by running:
   ```bash
   npm install
   ```

### CSS Compilation
The theme uses Tailwind CSS which needs to be compiled. Available npm scripts:

- **Build CSS once**: `npm run build` or `npm run tailwind:build`
  ```bash
  npx tailwindcss -i ./assets/css/tailwind.css -o ./assets/css/tailwind-output.css
  ```

- **Watch for changes**: `npm run dev` or `npm run tailwind:watch`
  ```bash
  npx tailwindcss -i ./assets/css/tailwind.css -o ./assets/css/tailwind-output.css --watch
  ```

### WordPress Integration
1. Place this theme folder in `wp-content/themes/` directory of your WordPress installation
2. Activate the theme in WordPress admin under Appearance > Themes
3. Compile CSS after any changes using the commands above

## Development Conventions

### Coding Standards
- PHP code follows WordPress coding standards
- CSS uses Tailwind utility classes with occasional custom styles
- JavaScript follows modern ES6+ practices
- Proper accessibility attributes are implemented (ARIA labels, screen reader text)

### Theme Functions
The main functionality is defined in `functions.php`:
- Theme support for various WordPress features
- Script and style enqueuing
- Custom logo support
- Post thumbnail support
- Block editor compatibility
- Custom functions like `docspresso_entry_footer()` and `docspresso_post_thumbnail()`

### Styling Approach
- Primary color: `#8B5CF6` (Purple-500 equivalent)
- Secondary color: `#7C3AED` (Purple-600 equivalent)
- Uses Tailwind's utility-first approach with custom extensions
- Responsive design with mobile navigation toggle
- Theme.json provides global styles and settings

### Template Hierarchy
The theme follows WordPress template hierarchy:
- `index.php` serves as fallback
- `front-page.php` for the front page
- `single.php` for individual posts
- `page.php` for static pages
- `archive.php` for archive/index pages
- Template parts in `/template-parts/` handle content display

### JavaScript Functionality
- Mobile menu toggle functionality
- Accessibility improvements for skip links
- DOM-ready event handling
- Proper ARIA attribute management for expandable menus

## Customization

### Colors
Colors can be customized in two places:
1. `tailwind.config.js` - defines the primary and secondary colors
2. `theme.json` - defines the color palette for the WordPress editor

### Typography
Typography is set using system fonts with responsive sizing. Font sizes can be adjusted in `theme.json` under the `typography.fontSizes` section.

### Layout
The theme uses a centered layout with a maximum width of 6xl (768px when converted). This can be adjusted in `assets/css/tailwind.css` in the `.site` class.

## WordPress Theme Requirements
- Requires WordPress 5.8 or higher
- Tested up to WordPress 6.4
- Requires PHP 7.4 or higher
- Full support for block editor functionality
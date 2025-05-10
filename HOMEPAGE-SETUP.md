# DocsPresso Theme - Google AI Inspired Homepage

This WordPress theme now includes Google AI-inspired homepage design with reusable block patterns.

## Features

### 🎨 Animated Gradient Background
- Fixed position gradient covering the upper third/half of viewport
- Smooth animation transitioning between deep red, pink, and purple tones
- Automatically applied to front page and blog index

### 📱 Responsive Design
- Mobile-first approach with responsive breakpoints
- Fixed header on front page with transparent background
- Proper mobile navigation

### 🧩 Block Patterns

The theme includes several reusable block patterns that can be used in the WordPress editor:

#### 1. Hero Section with Animated Gradient
- **Slug**: `docspresso/hero-section`
- **Features**: Large title, subtitle, action buttons with icons
- **Usage**: Perfect for homepage hero sections

#### 2. Build Section with Services
- **Slug**: `docspresso/build-section`
- **Features**: Two-column layout showcasing AI services
- **Usage**: Service offerings, product features

#### 3. Research Section with Articles
- **Slug**: `docspresso/research-section`
- **Features**: Dark theme, grid layout for articles/research
- **Usage**: Blog posts, research highlights, dark content sections

#### 4. Quick Action Buttons
- **Slug**: `docspresso/action-buttons`
- **Features**: Multiple button styles with icons and hover effects
- **Usage**: Call-to-action sections, feature highlighting

## How to Use Block Patterns

1. **In WordPress Editor**:
   - Open any page/post in the block editor
   - Click the "+" button to add blocks
   - Go to the "Patterns" tab
   - Look for "DocsPresso Sections" category
   - Insert any of the patterns

2. **Customization**:
   - All patterns are fully editable once inserted
   - Change text, colors, and links as needed
   - Patterns respect the theme's color palette

## Color Palette

The theme includes an extended color palette in `theme.json`:
- **Primary Purple**: #8B5CF6
- **Secondary Purple**: #7C3AED
- **Gray Scale**: 50, 100, 200, 400, 600, 700, 800, 900
- **Blue Accents**: Blue 100, Blue 600
- **Purple Variations**: Purple 100, Purple 600, Purple 700

## Development

### CSS Compilation
```bash
# Build once
npm run build

# Watch for changes
npm run dev
```

### File Structure
```
patterns/
├── hero-section.php          # Hero pattern with gradient background
├── build-section.php         # Build services section
├── research-section.php      # Research articles grid
└── action-buttons.php        # Quick action buttons

assets/css/
├── tailwind.css              # Source Tailwind CSS with custom styles
└── tailwind-output.css       # Compiled CSS output
```

## Customization Tips

1. **Gradient Colors**: Modify the gradient in `assets/css/tailwind.css` under `.animated-gradient`
2. **Animation Speed**: Change `animation: gradient 15s ease infinite;` duration
3. **Pattern Content**: Edit pattern files in `/patterns/` directory
4. **Color Scheme**: Update `theme.json` for block editor colors

## Browser Support

- Modern browsers with CSS Grid and Flexbox support
- Mobile browsers (iOS Safari 12+, Chrome Mobile 80+)
- Progressive enhancement for older browsers

## Performance

- Optimized CSS compilation with Tailwind
- Minimal JavaScript for mobile menu
- Proper image optimization support
- Fast-loading gradient animations
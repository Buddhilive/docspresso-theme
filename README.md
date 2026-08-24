# Docspresso — the official WordPress theme for BuddhiAI

![Docspresso](screenshot.png)

Docspresso is the official WordPress theme powering **BuddhiAI** — a site dedicated to educating people on and building an open-source, local-first edge AI ecosystem, so anyone can run capable, private AI on their own machine at no cost.

It's a hybrid full-site-editing (FSE) block theme built with Tailwind CSS: light/dark mode, native WordPress block styling throughout, and baseline SEO (meta tags, Open Graph, JSON-LD) that stays out of the way if a dedicated SEO plugin is installed later.

Google AdSense (Auto Ads, `ads.txt`) is handled by the official **Google AdSense** / **Site Kit by Google** plugin, not by the theme — install and configure one of those on the live site rather than editing theme code.

## Requirements

- WordPress 6.5+ (targets WordPress 7)
- PHP 8.0+
- Node.js + npm — **only needed for local development/building**, not on the production server

## Theme structure

| Path                     | Purpose                                                                      |
| ------------------------ | ---------------------------------------------------------------------------- |
| `templates/`             | Block templates (front page, blog index, single, page, archive, search, 404) |
| `parts/`                 | Template parts (header, footer)                                              |
| `patterns/`              | Reusable block patterns (hero, feature sections, page hero, blog cards)      |
| `assets/css/input.css`   | Tailwind source — edit this, never `assets/build/style.css` directly         |
| `assets/build/style.css` | Compiled, enqueued stylesheet (generated — do not hand-edit)                 |
| `theme.json`             | Global styles/settings: color palette, typography, native block styling      |
| `functions.php`          | Theme setup, SEO meta tags, block bindings                                   |

## Local development

```bash
npm install
npm run dev     # watches assets/css/input.css and rebuilds on save
npm run build   # one-off minified production build
```

Always run `npm run build` before packaging — the theme enqueues the **compiled** `assets/build/style.css`, not the Tailwind source, so a stale build means missing or outdated styles on the live site.

## Packaging the theme for upload

WordPress themes are distributed as a `.zip` containing the theme folder at the top level (i.e. unzipping it should produce a `docspresso-theme/` directory, not the files loose at the archive root).

1. **Build the production CSS** (skip this and the site ships with stale/missing styles):
   ```bash
   npm run build
   ```
2. **Exclude development-only files** from the archive — they're not needed at runtime and only bloat the upload:
   - `node_modules/`
   - `.git/`, `.gitignore`
   - `package.json`, `package-lock.json`
   - `tailwind.config.js`, `postcss.config.js`
   - `assets/css/` (the Tailwind _source_ — only `assets/build/style.css` is enqueued)

   Everything else (`templates/`, `parts/`, `patterns/`, `assets/build/`, `assets/fonts/`, `assets/js/`, `functions.php`, `theme.json`, `style.css`, `screenshot.png`, `LICENSE`) is required.

3. **Create the zip.** From the `wp-content/themes/` directory (one level above the theme folder), so the theme folder itself is the zip's top-level entry:

   PowerShell:

   ```powershell
   Compress-Archive -Path "docspresso-theme" -DestinationPath "docspresso-theme.zip" -Force
   ```

   Then open the zip and delete the excluded folders/files listed above (`Compress-Archive` has no built-in exclude flag), or use a zip tool that supports exclusions (7-Zip, `git archive`, etc.) in one step:

   ```bash
   git archive --format=zip -o docspresso-theme.zip HEAD
   ```

   (`git archive` only includes tracked files, which already excludes `node_modules/` via `.gitignore` — just remember to `npm run build` and commit the fresh `assets/build/style.css` first, since gitignored or uncommitted changes won't be included.)

## Uploading to a WordPress site

**Option A — WordPress admin (simplest, most sites):**

1. Log in to `wp-admin` → **Appearance → Themes → Add New Theme → Upload Theme**.
2. Choose `docspresso-theme.zip` and click **Install Now**.
3. Click **Activate**.

**Option B — FTP/SFTP or hosting file manager (needed if the zip exceeds the host's upload limit):**

1. Unzip `docspresso-theme.zip` locally.
2. Upload the resulting `docspresso-theme/` folder into `wp-content/themes/` on the server, so the final path is `wp-content/themes/docspresso-theme/`.
3. In `wp-admin` → **Appearance → Themes**, activate **Docspresso**.

### After activating, on the live site

- **Appearance → Editor → Navigation** — add a link to the Products page (navigation menus live in the database, not the theme, so this has to be done per-site).
- **Settings → General** — set the Tagline; it's used as the fallback meta description.
- Install and configure the **Google AdSense** (or **Site Kit by Google**) plugin to enable Auto Ads and `ads.txt`.
- Set a **Custom Logo** and a **Site Icon** under **Appearance → Editor → Styles** / **Site Identity**.
- Create the pages the homepage links to (e.g. a page with the `products` slug) — the hero and closing CTA buttons point at `/products/` by default.

## License

GPL v2 or later — see [LICENSE](LICENSE).

# Ashfield Travel — GeneratePress Child Theme

Premium WordPress child theme for [Ashfield Travel](https://ashfieldtravel.co.uk), a UK travel company specialising in curated holidays for British-Indian families.

## Brand

| Token | Value |
|---|---|
| Navy | `#1B2D4F` |
| Terracotta | `#C4572A` |
| Gold | `#C9A84C` |
| Cream | `#FAF7F2` |
| Heading font | Cormorant Garamond |
| Body font | Inter |

## Requirements

- WordPress 6.4+
- [GeneratePress](https://generatepress.com/) (free) + **GeneratePress Premium** plugin
- PHP 8.0+
- SiteGround GrowBig hosting (or any host with PHP 8+)

## Folder Structure

```
ashfield-travel-theme/
├── style.css              # Child theme declaration + CSS variables
├── functions.php          # Enqueue assets, GP defaults, schema, widgets
├── assets/
│   ├── css/
│   │   └── custom.css     # All component & layout styles
│   └── js/
│       └── custom.js      # Filter pills, scroll effects, mobile menu
├── template-parts/        # Custom template partials (top-bar, hero, etc.)
├── inc/                   # Additional PHP includes (hooks, helpers)
└── README.md
```

## Installation

### Local development
1. Clone this repo into `wp-content/themes/ashfield-travel-theme/`
2. Activate **GeneratePress** (parent), then activate **Ashfield Travel** child theme
3. Install and activate **GeneratePress Premium** plugin

### SiteGround deployment (via GitHub)
See the [Deployment](#deployment) section below.

## Development Workflow

Edit files locally → commit → push to `main` → SiteGround auto-deploys via Git.

### Key files to edit

| What you want to change | File |
|---|---|
| Colours / font variables | `style.css` (`:root` block) |
| Layout & component styles | `assets/css/custom.css` |
| GP defaults (widths, base colours) | `functions.php` → `ashfield_gp_defaults()` |
| Front-end interactions | `assets/js/custom.js` |
| Schema.org data | `functions.php` → `ashfield_schema_org()` |

## Deployment

### Connect GitHub → SiteGround

1. **SiteGround Site Tools** → *Devs* → **Git**
2. Click **Create Repository** on the remote path:
   `/home/[account]/public_html/wp-content/themes/ashfield-travel-theme`
3. Copy the SSH public key shown and add it to your GitHub repo:
   *Settings → Deploy keys → Add deploy key* (check "Allow write access" only if needed)
4. In SiteGround Git, set **Remote URL** to your GitHub SSH URL:
   `git@github.com:YOUR-USERNAME/ashfield-travel-theme.git`
5. Set branch to `main`
6. Enable **Auto-deploy on push** (webhook)

From then on: `git push origin main` → SiteGround pulls and deploys automatically.

## Customising in WordPress

After activating the theme, use **Appearance → Customise** (GeneratePress Customiser) to set:

- **Site Identity**: Upload logo, set site title to "Ashfield Travel"
- **Typography**: Confirm Cormorant Garamond (headings) / Inter (body) — pre-set in `functions.php`
- **Colours**: Use the CSS variables defined in `style.css` — change in one place, updates everywhere
- **Layout**: Container width is set to 1280px

## Plugin Recommendations

| Plugin | Purpose |
|---|---|
| GeneratePress Premium | GP blocks, sections, header builder |
| Yoast SEO | Meta tags, schema, sitemaps |
| WPForms Lite | Enquiry / brochure request form |
| WP Rocket | Caching & performance |
| Smush | Image optimisation |
| MailPoet | Newsletter / brochure emails |

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

> **Hosting:** SiteGround GrowBig — uses SSH + `git pull` (no Git GUI needed).

### First-time setup (run once after buying SiteGround)

**Step 1 — Configure your .env**
```bash
cp .env.example .env
# Open .env and fill in your SiteGround SSH details
```

Find your SSH details in:
**SiteGround Site Tools → Devs → SSH Keys Manager**

| .env variable | Where to find it |
|---|---|
| `SG_USER` | Site Tools → Info & Settings → Account username |
| `SG_HOST` | Site Tools → Devs → SSH Keys → Server hostname |
| `SG_PORT` | Always `18765` on SiteGround |
| `SG_THEMES_DIR` | `/home/USERNAME/public_html/wp-content/themes` |

**Step 2 — Add your Mac SSH key to SiteGround**

Copy your key:
```bash
cat ~/.ssh/ashfield_deploy.pub
```
Go to: **Site Tools → Devs → SSH Keys Manager → Add New Key** → paste it.

**Step 3 — Clone the repo onto the server (once)**
```bash
chmod +x setup-server.sh
./setup-server.sh
```

This SSHs into SiteGround, clones the GitHub repo into the themes folder, and sets permissions.

---

### Every deploy after that — one command

```bash
./deploy.sh
```

That's it. It will:
1. SSH into SiteGround
2. `git pull origin main` in the theme folder
3. Fix file permissions
4. Flush WordPress cache via WP-CLI
5. Confirm the last commit deployed

### Typical workflow

```bash
# 1. Edit files locally
# 2. Commit
git add -p
git commit -m "Update hero styles"

# 3. Push to GitHub
git push origin main

# 4. Deploy to SiteGround
./deploy.sh
```

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

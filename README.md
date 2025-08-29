# The Profit Platform - WordPress Repository

Simple WordPress child theme and plugin repository optimized for Hostinger Git deployment.

## Repository Structure

```
your-repo/
├─ .gitignore
├─ README.md
├─ .github/
│  └─ workflows/
│     └─ deploy.yml          # Optional webhook trigger
├─ scripts/
│  ├─ wp-post.js             # REST helper for content (hybrid)
│  └─ health-check.mjs       # Health check script
└─ wp-content/
   ├─ themes/
   │  └─ kadence-pp-child/   # Kadence child theme
   │     ├─ style.css
   │     ├─ functions.php
   │     ├─ index.php
   │     └─ assets/
   │        ├─ css/custom.css
   │        └─ js/custom.js
   └─ plugins/
      └─ pp-site/            # Site-specific plugin
         ├─ pp-site.php
         └─ assets/tweaks.css
```

## Deployment Options

Choose one of these deployment methods:

### Option A: GitHub Actions with FTP/SFTP (Recommended)

This method uses GitHub Actions to automatically deploy your theme via FTP/SFTP.

#### Step 1: Configure GitHub Secrets

Go to your GitHub repository → Settings → Secrets and variables → Actions, and add these secrets:

- `FTP_HOST`: `157.173.208.160`
- `FTP_USERNAME`: `u574235449.theprofitplatform.com.au`  
- `FTP_PASSWORD`: `Security@977`
- `FTP_PORT`: `21` (for FTPS) or `22` (for SFTP)
- `FTP_SERVER_DIR`: `/public_html/wp-content/themes/kadence-pp-child/` (adjust path as needed)

#### Step 2: Choose Deployment Method

The repository includes two workflow files:

1. **FTPS (Port 21)** - `.github/workflows/deploy-ftps.yml` 
   - Uses explicit TLS over port 21
   - Most common and reliable
   
2. **SFTP (Port 22)** - `.github/workflows/deploy-sftp.yml`
   - Uses SSH protocol 
   - More secure but requires SSH access

**Enable only one workflow** by deleting the other file or renaming it with `.disabled` extension.

#### Step 3: Deploy

```bash
git add .
git commit -m "Deploy theme to production"
git push origin main
```

GitHub Actions will automatically deploy your theme to the server.

### Option B: Hostinger Git Integration

Alternative method using Hostinger's built-in Git integration.

#### Step 1: Repository Configuration

1. **Push this repository to GitHub**:
   ```bash
   git add .
   git commit -m "Initial WordPress structure"
   git push origin main
   ```

2. **Make repository public** (or set up deploy keys for private repos)

#### Step 2: Hostinger Git Integration

1. **Go to Hostinger hPanel → Website → Git**

2. **Fill in the Git form**:
   - **Repository URL**: `https://github.com/Theprofitplatform/online.git`
   - **Branch**: `main`
   - **Target Directory**: Choose one of:
     - For theme only: `wp-content/themes/kadence-pp-child`
     - For plugin only: `wp-content/plugins/pp-site`
     - For both: `wp-content` (deploys entire wp-content structure)

3. **Important**: The target directory must be **NEW and empty**. If you get "Project directory is not empty" error, use a fresh folder name.

4. **Deploy**: Click "Create" and Hostinger will:
   - Clone your repository
   - Set up automatic webhooks
   - Pull changes on every push to main

### Step 3: WordPress Configuration

After deployment, activate your components:

1. **Activate Child Theme**:
   - Go to WordPress Admin → Appearance → Themes
   - Activate "Kadence PP Child"

2. **Activate Plugin** (if deployed):
   - Go to WordPress Admin → Plugins
   - Activate "PP Site Tweaks"

## Child Theme Details

### Kadence Child Theme Structure

- **style.css**: Theme header and basic styles
- **functions.php**: Enqueues parent theme, child theme, and custom assets
- **index.php**: Fallback file to prevent directory browsing
- **assets/css/custom.css**: Your custom CSS
- **assets/js/custom.js**: Your custom JavaScript

### Customization Workflow

1. **Edit local files** in `wp-content/themes/kadence-pp-child/`
2. **Test locally** (if you have local WordPress setup)
3. **Commit and push** to GitHub
4. **Auto-deploy** via Hostinger webhook

## Site Plugin Details

The `pp-site` plugin handles site-specific functionality:

- **Lightweight**: Minimal CSS and functionality tweaks
- **Future-ready**: Easy to extend with shortcodes, hooks, REST endpoints
- **Separate from theme**: Survives theme changes

## Content Management (Hybrid Approach)

### Option 1: WordPress Admin (Traditional)
Use WordPress admin for content creation and editing.

### Option 2: REST API (Automated)
Use the included script for automated content publishing:

```bash
# Set environment variables
export WP_URL="https://yoursite.com"
export WP_USER="your-username"
export WP_APP_PASSWORD="xxxx xxxx xxxx xxxx"

# Run content script
cd scripts
node wp-post.js
```

### WordPress Application Password Setup

1. **Go to**: WordPress Admin → Users → Your Profile → Application Passwords
2. **Create new**: Enter "Content Management" as application name
3. **Copy password**: Save it as `WP_APP_PASSWORD` environment variable
4. **Test connection**:
   ```bash
   curl -u "username:app-password" https://yoursite.com/wp-json/wp/v2/pages
   ```

## Development Workflow

### For Theme/Plugin Changes
```bash
# 1. Make changes locally
vim wp-content/themes/kadence-pp-child/assets/css/custom.css

# 2. Commit and push
git add .
git commit -m "Update custom styles"
git push origin main

# 3. Hostinger auto-deploys (30-60 seconds)
```

### For Content Changes
```bash
# 1. Update content script
vim scripts/wp-post.js

# 2. Run content script
node scripts/wp-post.js

# 3. Content appears immediately
```

## File Management

### What to Track in Git
- ✅ Child theme files
- ✅ Custom plugins
- ✅ Configuration files
- ✅ Scripts and helpers

### What NOT to Track
- ❌ WordPress core files
- ❌ Parent themes (installed via WP admin)
- ❌ Uploads folder
- ❌ Cache files
- ❌ wp-config.php

## Troubleshooting

### Common Issues

**GitHub Actions FTP deployment fails**
- Check FTP credentials in GitHub Secrets
- Verify `FTP_SERVER_DIR` path exists on server
- Try FTPS instead of SFTP (or vice versa)
- Check server logs in Hostinger hPanel

**"Project directory is not empty" (Git method)**
- Solution: Use a different target directory name in Hostinger Git setup

**Child theme not showing**
- Check that target directory is `wp-content/themes/kadence-pp-child`
- Verify parent Kadence theme is installed
- Check style.css header format

**Assets not loading**
- Verify file paths in functions.php
- Check file permissions on server (should be 644 for files, 755 for folders)
- Clear any caching
- Check if files were actually uploaded via FTP

**REST API 401 errors**
- Verify Application Password is correct
- Check user permissions
- Test with curl first

**FTP connection issues**
- Verify FTP credentials: `157.173.208.160:21`
- Test FTP connection manually with FileZilla
- Check if server supports FTPS/SFTP

### Testing Commands

```bash
# Test WordPress REST API
curl -u "user:pass" https://yoursite.com/wp-json/wp/v2/pages

# Test health check
CHECK_URL="https://yoursite.com" node scripts/health-check.mjs

# Check Git deployment
git log --oneline -5  # See recent commits
```

## Blank Canvas Template - Drop in Existing HTML

### Zero Rebuild, Zero Downtime Migration

The child theme includes a **Blank Canvas** page template that lets you drop existing HTML directly into WordPress without rebuilding anything.

#### How It Works

1. **Full HTML Control**: Template renders your complete HTML without Kadence header/footer
2. **WordPress Integration**: Still loads `wp_head()` and `wp_footer()` for plugins/SEO
3. **Progressive Enhancement**: Convert pieces to WordPress gradually over time

#### Setup Steps

1. **Deploy your theme** (using FTP or Git methods above)

2. **In WordPress Admin**:
   - Go to **Pages → Add New**
   - Title: "Home" (or your page name)
   - In **Page Attributes** box, select **Template**: "Blank Canvas (No Header/Footer)"
   - **Publish** the page

3. **Set as Homepage** (if needed):
   - Go to **Settings → Reading**
   - Select "A static page" 
   - Choose your new page as "Homepage"
   - **Save Changes**

#### Adding Your HTML

1. **Edit the template**: `wp-content/themes/kadence-pp-child/page-templates/blank-canvas.php`

2. **Replace the example HTML** between these comments:
   ```php
   <!-- ↓↓↓ PASTE YOUR FULL PAGE HTML BODY MARKUP HERE ↓↓↓ -->
   <!-- Your existing HTML goes here -->
   <!-- ↑↑↑ REPLACE ABOVE WITH YOUR ACTUAL HTML ↑↑↑ -->
   ```

3. **Add your CSS** to: `wp-content/themes/kadence-pp-child/assets/css/custom.css`

4. **Add your JS** to: `wp-content/themes/kadence-pp-child/assets/js/custom.js`

5. **Commit and deploy**:
   ```bash
   git add .
   git commit -m "Add existing HTML to blank canvas template"
   git push origin main
   ```

#### Progressive WordPress-ification

Once your existing site is working in WordPress, gradually convert sections:

**Phase 1: Static HTML** (Immediate)
- Drop in existing HTML/CSS/JS
- Zero changes to existing code
- WordPress plugins/SEO still work

**Phase 2: Dynamic Content** (Later)
- Replace hardcoded text with WordPress editor content
- Add WordPress menus for navigation
- Convert contact forms to WordPress forms

**Phase 3: Full Integration** (Eventually)
- Use WordPress blocks and themes
- Add blog functionality
- Full CMS capabilities

#### Example Usage

```php
<!-- In blank-canvas.php -->
<main id="main">
  <!-- Your existing homepage HTML -->
  <section class="hero">
    <h1>Welcome to The Profit Platform</h1>
    <p>Paste your existing hero section here</p>
  </section>
  
  <section class="services">
    <!-- Your existing services HTML -->
  </section>
  
  <!-- etc... -->
</main>
```

#### Multiple Pages

Create additional pages for different HTML layouts:
1. **Duplicate** `blank-canvas.php` as `blank-canvas-about.php`
2. **Change** Template Name to "Blank Canvas - About"
3. **Replace** HTML with your about page content
4. **Create new WordPress page** using this template

## Custom Header System

### Override Kadence Header

The child theme includes a complete custom header system that replaces Kadence's default header with your own design.

#### What's Included

✅ **Custom Header Template** - `header.php` overrides Kadence's header
✅ **Sticky Navigation** - Modern glassmorphism effect with scroll detection
✅ **Responsive Design** - Mobile hamburger menu with animations
✅ **WordPress Integration** - Uses WordPress menus and custom logo
✅ **Accessibility** - ARIA labels, keyboard navigation, focus management

#### Features

- **Brand Logo** - Uses WordPress Custom Logo or site name fallback
- **Navigation Menu** - WordPress menu system with hover effects
- **Call-to-Action** - Phone number and CTA button
- **Mobile Menu** - Slide-down mobile navigation with animations
- **Scroll Effects** - Header styling changes on scroll

#### WordPress Setup

After deploying, configure the header in WordPress Admin:

1. **Set Up Navigation**:
   - Go to **Appearance → Menus**
   - Create a new menu (e.g., "Main Menu")
   - Add your pages/links to the menu
   - In **Menu Settings**, check "Primary Menu"
   - **Save Menu**

2. **Add Your Logo**:
   - Go to **Appearance → Customize → Site Identity**
   - Upload your logo image
   - **Publish** changes

3. **Customize Contact Info**:
   - Edit `wp-content/themes/kadence-pp-child/header.php`
   - Update phone number: `tel:1300123456`
   - Update CTA link: `/contact` path
   - Update CTA text: "Get Free Audit"

#### Header Structure

```php
<!-- header.php structure -->
<header id="pp-header" class="pp-header">
  <div class="pp-header__inner">
    <!-- Logo/Brand -->
    <a class="pp-logo" href="/">
      <img src="your-logo.png" alt="Site Name">
    </a>
    
    <!-- Desktop Navigation -->
    <nav class="pp-nav">
      <ul class="pp-menu">
        <li><a href="/about">About</a></li>
        <li><a href="/services">Services</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </nav>
    
    <!-- Actions -->
    <div class="pp-actions">
      <a class="pp-phone" href="tel:1300123456">1300 123 456</a>
      <a class="pp-btn" href="/contact">Get Free Audit</a>
      <button class="pp-burger">☰</button>
    </div>
  </div>
  
  <!-- Mobile Menu -->
  <div id="pp-mobile" class="pp-mobile">
    <!-- Mobile navigation items -->
  </div>
</header>
```

#### Customization

**Colors & Branding** (in `assets/css/header.css`):
```css
:root{
  --pp-primary: #2c86f9;    /* Your brand color */
  --pp-black: #0f172a;      /* Dark text color */
  --pp-white: #fff;         /* Light text color */
  --pp-radius: 14px;        /* Border radius */
  --pp-shadow: 0 10px 30px rgba(0,0,0,.08); /* Shadow effect */
}
```

**Contact Information** (in `header.php`):
- Phone number: Update `href="tel:1300123456"` and display text
- CTA button: Update link and text
- CTA destination: Change `/contact` to your contact page

**Logo Sizing**:
```css
.pp-logo img { 
  height: 42px; /* Adjust logo height */
  width: auto; 
}
```

#### Mobile Menu Behavior

- **Click outside** to close menu
- **Escape key** to close menu
- **Anchor links** auto-close menu
- **Body scroll** locked when open
- **Smooth animations** for open/close

#### Integration Notes

- **Replaces Kadence header** completely site-wide
- **Maintains WordPress functionality** (menus, custom logo, etc.)
- **SEO friendly** with proper semantic markup
- **Performance optimized** with efficient CSS and JS

## Next Steps

1. **Deploy to Hostinger** using the deployment methods above
2. **Install Kadence theme** via WordPress admin (if not already installed)  
3. **Activate your child theme** in WordPress admin
4. **Create your first Blank Canvas page** with existing HTML
5. **Test that everything works** - your HTML should render perfectly
6. **Set up REST API** for content management (optional)
7. **Gradually convert** static elements to WordPress dynamic content

## Support

- **Hostinger Git Issues**: Check hPanel → Git section for deployment logs
- **Theme Issues**: Verify parent theme is installed and child theme structure
- **REST API Issues**: Test authentication with curl first
- **General WordPress**: Standard WordPress troubleshooting applies
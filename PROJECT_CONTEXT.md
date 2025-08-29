# The Profit Platform - WordPress Project Context

## 📋 Project Overview

**Repository**: https://github.com/Theprofitplatform/online.git  
**Purpose**: WordPress website with hybrid deployment (code via Git, content via REST API)  
**Theme**: Kadence child theme with custom header system  
**Hosting**: Hostinger  
**Last Updated**: January 17, 2025  

## 🏗️ Current Architecture

### Repository Structure
```
wp-site/
├── .github/workflows/          # Deployment workflows (currently disabled)
│   ├── deploy-ftps.yml.disabled
│   └── deploy-sftp.yml.disabled
├── wp-content/
│   ├── themes/kadence-pp-child/ # Main child theme
│   │   ├── assets/             # CSS, JS, images
│   │   ├── page-templates/     # Custom page templates
│   │   ├── header.php          # Custom header override
│   │   ├── functions.php       # Theme functionality
│   │   └── style.css           # Theme metadata
│   └── plugins/pp-site/        # Site-specific plugin
├── scripts/                    # Helper scripts
├── DEPLOYMENT_TEST.txt         # Git deployment test file
└── README.md                   # Full documentation
```

## 🎨 Theme Features Implemented

### ✅ Custom Child Theme
- **Name**: Kadence PP Child
- **Version**: 1.0.1
- **Parent**: Kadence theme (must be installed separately)
- **Location**: `wp-content/themes/kadence-pp-child/`

### ✅ Custom Header System
- **Complete header override** - replaces Kadence header site-wide
- **WordPress integration** - uses WP menus and custom logo
- **Responsive design** - desktop nav + mobile hamburger menu
- **Modern styling** - glassmorphism sticky header with scroll effects
- **Accessibility** - ARIA labels, keyboard navigation

#### Header Configuration:
- **Phone**: 1300 123 456 (update in header.php)
- **CTA Button**: "Get Free Audit" → /contact (update in header.php)
- **Primary color**: #2c86f9 (update in header.css)

### ✅ Blank Canvas Template
- **Purpose**: Drop existing HTML into WordPress without rebuild
- **Location**: `page-templates/blank-canvas.php`
- **Usage**: Create WP page, select template, replace example HTML
- **Features**: Full HTML control, WordPress integration, progressive enhancement

### ✅ Assets & Functionality
- **Header CSS/JS**: Modern animations, mobile menu, scroll effects
- **Custom CSS**: Example styling for hero, features, contact sections
- **PP Site Plugin**: Minimal plugin for site-specific functionality

## 🚀 Deployment Status

### Current Deployment Method: **PENDING SETUP**

#### Option A: Hostinger Git Integration (Recommended)
- **Status**: ⏳ Ready to configure
- **Setup**: Hostinger hPanel → Git → Add Repository
- **Repository**: `https://github.com/Theprofitplatform/online.git`
- **Branch**: `main`
- **Target**: `wp-content/themes/kadence-pp-child`
- **Test File**: `DEPLOYMENT_TEST.txt` (will appear if working)

#### Option B: GitHub Actions FTP (Currently Disabled)
- **Status**: ❌ Temporarily disabled due to connection issues
- **Issue**: FTP hostname resolution failure
- **Files**: `deploy-ftps.yml.disabled`, `deploy-sftp.yml.disabled`
- **Required**: Correct Hostinger FTP hostname (not IP address)

## 📊 Implementation Progress

### ✅ Completed
- [x] Repository structure and organization
- [x] Kadence child theme creation
- [x] Custom header system with navigation
- [x] Blank Canvas template for HTML migration
- [x] Responsive design and mobile menu
- [x] WordPress integration (menus, custom logo, etc.)
- [x] PP Site plugin structure
- [x] GitHub repository setup with all files
- [x] Documentation and README
- [x] Deployment workflows (disabled pending connection fix)

### ⏳ Pending Setup
- [ ] Hostinger Git integration configuration
- [ ] Kadence parent theme installation
- [ ] WordPress theme activation
- [ ] Navigation menu creation
- [ ] Custom logo upload
- [ ] Contact information customization

### 🎯 Future Enhancements
- [ ] Content migration to WordPress
- [ ] Blog functionality
- [ ] Contact form integration
- [ ] SEO optimization
- [ ] Performance optimization

## 🔧 WordPress Configuration Required

After deployment, complete these steps in WordPress Admin:

### 1. Install Dependencies
- Install **Kadence theme** (parent theme)
- Install **Rank Math** plugin (SEO)

### 2. Activate Theme
- **Appearance → Themes**
- Activate **"Kadence PP Child"**

### 3. Configure Header
- **Appearance → Menus**
  - Create new menu
  - Add pages/links
  - Assign to "Primary Menu"
- **Appearance → Customize → Site Identity**
  - Upload logo
  - Set site title/tagline

### 4. Create Pages
- Create homepage using "Blank Canvas" template
- Replace example HTML with actual content
- **Settings → Reading** → Set static homepage

## 🛠️ Technical Specifications

### Server Requirements
- **Hosting**: Hostinger
- **PHP**: 7.4+ (WordPress requirement)
- **WordPress**: 5.0+
- **Theme**: Kadence (parent theme)

### FTP Credentials (If Needed)
- **Host**: 157.173.208.160 (may need correct hostname)
- **Username**: u574235449.theprofitplatform.com.au
- **Password**: Security@977
- **Port**: 21 (FTPS) or 22 (SFTP)

### GitHub Repository
- **Public repository**: Accessible without authentication
- **Main branch**: All production code
- **Auto-deploy**: Configured for main branch pushes

## 🚨 Current Issues & Solutions

### Issue 1: FTP Deployment Failure
**Problem**: GitHub Actions FTP deployment fails with hostname resolution error  
**Status**: Temporarily disabled workflows  
**Solution Options**:
1. Use Hostinger Git integration instead (recommended)
2. Find correct FTP hostname from Hostinger hPanel
3. Manual deployment via File Manager

### Issue 2: Deployment Method Selection
**Problem**: Multiple deployment options available  
**Recommendation**: Use Hostinger Git integration for reliability  
**Backup**: Manual upload if Git integration unavailable

## 📞 Next Actions Required

### Immediate (User Action Needed)
1. **Set up Hostinger Git integration**
   - Login to Hostinger hPanel
   - Navigate to Git section
   - Configure repository connection
   
2. **Verify deployment**
   - Check for `DEPLOYMENT_TEST.txt` file on server
   - Confirm theme files are deployed

### After Deployment
3. **WordPress theme setup**
   - Install Kadence parent theme
   - Activate child theme
   - Configure menus and logo

4. **Content migration**
   - Use Blank Canvas template
   - Replace example HTML with actual content
   - Test responsive design

## 📚 Key Files Reference

### Theme Files
- `wp-content/themes/kadence-pp-child/functions.php` - Theme functionality
- `wp-content/themes/kadence-pp-child/header.php` - Custom header
- `wp-content/themes/kadence-pp-child/assets/css/header.css` - Header styles
- `wp-content/themes/kadence-pp-child/page-templates/blank-canvas.php` - HTML template

### Configuration Files
- `README.md` - Complete setup and usage documentation
- `package.json` - Node.js dependencies for REST API scripts
- `scripts/wp-post.js` - WordPress REST API helper

### Deployment Files
- `.github/workflows/*.disabled` - GitHub Actions workflows (disabled)
- `DEPLOYMENT_TEST.txt` - Git deployment verification file

---

**For detailed setup instructions, see README.md**  
**For issues or questions, reference this context file**
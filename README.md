# Fabify - WordPress E-Commerce Theme

A premium curated marketplace theme for WordPress with WooCommerce integration, designed for easy deployment on Hostinger.

## 🚀 Quick Preview

**See the theme design in action before deploying to WordPress!**

[![Preview](https://img.shields.io/badge/🌐_Live_Preview-localhost:3000-blue?style=for-the-badge)](http://localhost:3000)
[![Guide](https://img.shields.io/badge/📖_Preview_Guide-PREVIEW__GUIDE.md-green?style=for-the-badge)](PREVIEW_GUIDE.md)

### Launch Methods

**🪟 Windows:**
```bash
preview.bat
```

**🐧 Linux / 🍎 Mac:**
```bash
./preview.sh
```

**📦 Manual:**
```bash
cd frontend
npm install
npm start
```

The preview server will automatically:
- ✅ Detect and install dependencies if needed
- ✅ Start the development server on port 3000
- ✅ Open your browser automatically to http://localhost:3000

> **Note:** This preview shows the static HTML design. For full WordPress/WooCommerce functionality, follow the installation guide below.

---

## 🎉 What's New - Fixed & Ready for Hostinger!

The theme has been properly restructured as a **complete WordPress theme** ready for installation on Hostinger or any WordPress site.

## 📁 Repository Structure

```
Fabify/
├── fabify-theme/              # ⭐ WordPress Theme (Upload this to WordPress!)
│   ├── style.css              # Theme stylesheet with WordPress header
│   ├── functions.php          # Theme functions and WooCommerce integration
│   ├── header.php             # Site header with navigation
│   ├── footer.php             # Site footer with cart sidebar
│   ├── front-page.php         # Homepage template
│   ├── index.php              # Archive/blog template
│   ├── screenshot.png         # Theme thumbnail
│   ├── README.md              # Theme documentation
│   ├── INSTALLATION.md        # Quick installation guide
│   └── assets/
│       ├── css/               # Additional styles
│       ├── js/
│       │   └── custom.js      # Cart & carousel functionality
│       └── images/            # Theme images
│
├── WORDPRESS_SETUP_GUIDE.md   # Complete Hostinger setup guide
├── Qwen_html_20251004_gwewc78ws.html  # Original HTML reference
└── Other reference files...
```

## 🚀 Quick Start

### Option 1: Direct Upload to WordPress (Recommended)

1. **Zip the theme folder**:
   ```bash
   cd fabify-theme
   zip -r fabify-theme.zip .
   ```

2. **Upload to WordPress**:
   - Login to WordPress Admin: `https://yourdomain.com/wp-admin`
   - Go to **Appearance** → **Themes** → **Add New** → **Upload Theme**
   - Choose `fabify-theme.zip` and click **Install Now**
   - Click **Activate**

3. **Install WooCommerce**:
   - Go to **Plugins** → **Add New**
   - Search for "WooCommerce"
   - Install and activate
   - Follow the setup wizard

### Option 2: FTP Upload to Hostinger

1. Connect to Hostinger via FTP
2. Navigate to `/public_html/wp-content/themes/`
3. Upload the `fabify-theme` folder
4. Activate the theme in WordPress admin

## 📚 Documentation

- **[fabify-theme/INSTALLATION.md](fabify-theme/INSTALLATION.md)** - Quick installation guide
- **[fabify-theme/README.md](fabify-theme/README.md)** - Theme features and customization
- **[WORDPRESS_SETUP_GUIDE.md](WORDPRESS_SETUP_GUIDE.md)** - Complete Hostinger setup guide

## ✨ Features

- ✅ **Modern E-Commerce Design** - Clean, responsive layout
- ✅ **Hero Carousel** - Eye-catching rotating hero section
- ✅ **Product Showcase** - Featured products, deals, best sellers
- ✅ **Shopping Cart** - Real-time cart sidebar with AJAX
- ✅ **WooCommerce Ready** - Full integration with WooCommerce
- ✅ **Mobile Responsive** - Works perfectly on all devices
- ✅ **Easy Customization** - WordPress Customizer integration
- ✅ **Fast & Optimized** - Performance-focused code

## 🔧 Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- WooCommerce 5.0 or higher (recommended)
- MySQL 5.6 or higher

## 🎨 Customization

After installation, customize your theme:

1. **Colors**: Go to **Appearance** → **Customize** → **Fabify Shop Options**
2. **Navigation**: Go to **Appearance** → **Menus**
3. **Widgets**: Go to **Appearance** → **Widgets**
4. **Hero Images**: Add images to `assets/images/` (hero1.jpg, hero2.jpg, hero3.jpg)

## 📦 What's Included

### Working Files:
- ✅ Complete WordPress theme structure
- ✅ WooCommerce integration
- ✅ Shopping cart functionality
- ✅ Hero carousel with auto-rotation
- ✅ Product display sections
- ✅ Responsive navigation
- ✅ Footer with widget areas

### Reference Files:
- `Qwen_html_20251004_gwewc78ws.html` - Original design reference
- Legacy PHP files (for reference only)

## 🐛 Troubleshooting

### Theme not showing after upload
- Ensure you uploaded to `/wp-content/themes/`
- Clear browser cache
- Check file permissions

### Products not displaying
- Install and activate WooCommerce
- Create at least one product
- Mark products as "Featured" for homepage display

### Cart not working
- Ensure WooCommerce is installed and activated
- Clear browser cache
- Check browser console for JavaScript errors

## 📞 Support

- **Hostinger Support**: 24/7 via live chat in hPanel
- **WordPress Documentation**: [wordpress.org/support](https://wordpress.org/support)
- **WooCommerce Docs**: [woocommerce.com/documentation](https://woocommerce.com/documentation)

## 📄 License

GNU General Public License v2 or later

## 🎉 You're Ready!

The theme is now properly structured and ready for deployment to Hostinger. Follow the installation guide and you'll have your marketplace up and running in minutes!

For detailed setup instructions, see **[WORDPRESS_SETUP_GUIDE.md](WORDPRESS_SETUP_GUIDE.md)**
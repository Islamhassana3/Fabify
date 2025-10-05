# Fabify WordPress Theme

A premium curated marketplace theme for WordPress with WooCommerce integration.

## Features

- **Modern Design**: Clean, responsive design optimized for e-commerce
- **Hero Carousel**: Eye-catching hero section with rotating slides
- **Product Showcase**: Featured products, deals, and best sellers sections
- **Shopping Cart**: Sidebar cart with real-time updates
- **WooCommerce Ready**: Full integration with WooCommerce for product management
- **Responsive**: Mobile-first design that works on all devices
- **Performance Optimized**: Fast loading times with optimized assets

## Installation

### Quick Installation on Hostinger

1. **Upload Theme Files**:
   - Log in to your WordPress admin panel at `https://yourdomain.com/wp-admin`
   - Go to **Appearance** → **Themes**
   - Click **Add New** → **Upload Theme**
   - Choose the `fabify-theme.zip` file (or upload the entire `fabify-theme` folder via FTP to `/wp-content/themes/`)
   - Click **Install Now** and then **Activate**

2. **Install Required Plugins**:
   - WooCommerce (required for e-commerce functionality)
   - Stripe Payment Gateway (for payment processing)
   - WooCommerce REST API (for API integration)

3. **Configure WooCommerce**:
   - Follow the WooCommerce setup wizard
   - Configure your store details, payment methods, and shipping options
   - See the `WORDPRESS_SETUP_GUIDE.md` in the root directory for detailed instructions

### Manual Installation via FTP

1. Connect to your Hostinger account via FTP
2. Navigate to `/wp-content/themes/`
3. Upload the `fabify-theme` folder
4. Log in to WordPress admin and activate the theme

## Theme Structure

```
fabify-theme/
├── style.css           # Main theme stylesheet with theme header
├── functions.php       # Theme functions and setup
├── index.php          # Default template for archives and product listings
├── front-page.php     # Homepage template with featured sections
├── header.php         # Header template with navigation
├── footer.php         # Footer template with cart sidebar
├── screenshot.png     # Theme thumbnail (1200x900px)
├── README.md          # This file
└── assets/
    ├── css/           # Additional stylesheets
    ├── js/
    │   └── custom.js  # Custom JavaScript for cart and carousel
    └── images/
        ├── hero1.jpg  # Hero carousel image 1
        ├── hero2.jpg  # Hero carousel image 2
        └── hero3.jpg  # Hero carousel image 3
```

## Adding Hero Images

To customize the hero carousel images:

1. Add three images to `assets/images/` named:
   - `hero1.jpg` (recommended size: 1920x1080px)
   - `hero2.jpg` (recommended size: 1920x1080px)
   - `hero3.jpg` (recommended size: 1920x1080px)

2. The images will automatically be used in the hero carousel on the front page

## Customization

### Colors

To change the primary color:

1. Go to **Appearance** → **Customize** → **Fabify Shop Options**
2. Select your desired primary color
3. Click **Publish**

### Navigation Menus

1. Go to **Appearance** → **Menus**
2. Create a new menu
3. Assign it to the **Primary Menu** location

### Widgets

The theme includes widget areas for:
- Main Sidebar
- Footer Widget Area 1-4

Configure these at **Appearance** → **Widgets**

## WooCommerce Integration

This theme is fully compatible with WooCommerce. Once you install and activate WooCommerce:

1. Products will automatically appear in the featured sections
2. The shopping cart functionality will work with WooCommerce's cart
3. Product categories and tags will be supported

### Adding Products

1. Go to **Products** → **Add New**
2. Fill in product details (name, description, price, images)
3. Set product categories and tags
4. Check **Featured Product** to show it in the featured section
5. Add a sale price to show discount badges

## Support

For issues specific to Hostinger:
- Contact Hostinger Support (24/7 via live chat)

For WordPress and WooCommerce issues:
- [WordPress Support](https://wordpress.org/support)
- [WooCommerce Documentation](https://woocommerce.com/documentation)

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- WooCommerce 5.0 or higher (recommended)
- MySQL 5.6 or higher

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## License

This theme is licensed under the GNU General Public License v2 or later.

## Credits

- Font Awesome for icons
- Google Fonts (Inter, Space Grotesk)
- Unsplash for placeholder images

## Changelog

### Version 1.0.0
- Initial release
- Hero carousel with 3 slides
- Product showcase sections
- Shopping cart sidebar
- WooCommerce integration
- Responsive design

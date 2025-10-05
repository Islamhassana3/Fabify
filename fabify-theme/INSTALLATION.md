# Quick Installation Guide for Hostinger

## Step 1: Upload Theme to WordPress

### Option A: Upload via WordPress Admin (Recommended)

1. **Create a ZIP file** of the theme folder:
   - Compress the entire `fabify-theme` folder into a ZIP file
   - Name it `fabify-theme.zip`

2. **Upload to WordPress**:
   - Log in to your WordPress admin panel: `https://yourdomain.com/wp-admin`
   - Navigate to **Appearance** → **Themes**
   - Click **Add New** → **Upload Theme**
   - Click **Choose File** and select `fabify-theme.zip`
   - Click **Install Now**
   - Once installed, click **Activate**

### Option B: Upload via FTP (Alternative)

1. **Connect to Hostinger via FTP**:
   - Use FileZilla or your preferred FTP client
   - Get FTP credentials from Hostinger hPanel
   - Connect to your site

2. **Upload Theme**:
   - Navigate to `/public_html/wp-content/themes/`
   - Upload the entire `fabify-theme` folder
   - The path should be: `/public_html/wp-content/themes/fabify-theme/`

3. **Activate Theme**:
   - Go to WordPress admin → **Appearance** → **Themes**
   - Find "Fabify Shop" and click **Activate**

## Step 2: Install Required Plugins

Go to **Plugins** → **Add New** and install these plugins:

1. **WooCommerce** (required)
   - Search for "WooCommerce"
   - Click **Install Now** → **Activate**
   - Follow the setup wizard

2. **Stripe Payment Gateway** (recommended)
   - Search for "WooCommerce Stripe Payment Gateway"
   - Click **Install Now** → **Activate**

3. **Contact Form 7** (optional)
   - For contact forms
   - Click **Install Now** → **Activate**

## Step 3: Configure WooCommerce

1. After activating WooCommerce, you'll see a setup wizard
2. Follow these steps:
   - **Store Details**: Enter your business information
   - **Industry**: Select "Retail/Online Store"
   - **Product Types**: Select "Physical products"
   - **Business Details**: Enter address and tax info
   - **Payments**: Enable Stripe
   - **Shipping**: Configure your shipping zones

## Step 4: Add Sample Products (Optional)

1. Go to **Products** → **Add New**
2. Create a few sample products to test the theme:
   - Add product title
   - Add product description
   - Set regular price (e.g., $99.99)
   - Set sale price (e.g., $79.99) for discount badge
   - Upload product image
   - Check "Featured Product" to show on homepage
   - Publish

## Step 5: Add Hero Images

1. Via FTP or WordPress Media Library, add three images:
   - Upload to: `/wp-content/themes/fabify-theme/assets/images/`
   - Name them: `hero1.jpg`, `hero2.jpg`, `hero3.jpg`
   - Recommended size: 1920x1080px

## Step 6: Configure Navigation Menu

1. Go to **Appearance** → **Menus**
2. Click **Create a new menu**
3. Name it "Main Menu"
4. Add pages to the menu:
   - Shop
   - About
   - Contact
5. Under "Menu Settings", check **Primary Menu**
6. Click **Save Menu**

## Step 7: Configure Permalinks

1. Go to **Settings** → **Permalinks**
2. Select **Post name**
3. Click **Save Changes**

## Step 8: Test Your Site

1. Visit your homepage: `https://yourdomain.com`
2. Check that:
   - Theme is displaying correctly
   - Hero carousel is working
   - Products appear in featured sections
   - Shopping cart opens when clicking the cart icon

## Troubleshooting

### Theme doesn't appear after activation
- Clear browser cache
- Clear WordPress cache (if using a cache plugin)
- Check that all files uploaded correctly

### Products not showing
- Make sure WooCommerce is installed and activated
- Create at least one product
- Check that product is published (not draft)

### Hero carousel not working
- Ensure JavaScript is enabled in browser
- Check browser console for errors
- Clear cache and refresh page

### Cart not working
- Ensure WooCommerce is installed
- Clear browser cache
- Check that custom.js is loaded (view page source)

## Getting Help

1. **Check WordPress/WooCommerce documentation**
   - [WordPress Support](https://wordpress.org/support)
   - [WooCommerce Docs](https://woocommerce.com/documentation)

2. **Hostinger Support**
   - Available 24/7 via live chat in hPanel
   - Check Hostinger Knowledge Base

3. **Check the main WORDPRESS_SETUP_GUIDE.md** for detailed setup instructions

## Next Steps

After installation:
1. Customize colors via **Appearance** → **Customize**
2. Add more products
3. Configure shipping methods
4. Set up payment gateways
5. Add pages (About, Contact, Terms, Privacy Policy)
6. Configure email settings
7. Test checkout process with Stripe test mode

Your Fabify shop is now ready! 🎉

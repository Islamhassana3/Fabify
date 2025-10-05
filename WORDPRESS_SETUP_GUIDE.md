# WordPress Setup Guide for Fabify on Hostinger

This guide will help you set up WordPress with WooCommerce on Hostinger to power your Fabify marketplace backend.

## 🚀 Quick Start Overview

1. **Hostinger Setup**: Create hosting account and install WordPress
2. **WordPress Configuration**: Install required plugins and configure settings
3. **WooCommerce Setup**: Configure products, payments, and shipping
4. **Fabify Plugin**: Install our custom plugin for enhanced checkout
5. **Frontend Connection**: Connect your React frontend to WordPress

## 📋 Prerequisites

- Hostinger hosting account (Business plan or higher recommended)
- Domain name pointed to Hostinger
- Stripe account for payment processing
- SSL certificate (usually free with Hostinger)

## 🛠️ Step 1: Hostinger Setup

### 1.1 Create Hostinger Account
1. Go to [hostinger.com](https://hostinger.com)
2. Choose a Business plan (recommended for WooCommerce)
3. Register your domain or use an existing one
4. Complete the purchase

### 1.2 Install WordPress
1. Log in to your Hostinger hPanel
2. Go to **Website** → **Auto Installer**
3. Select **WordPress**
4. Fill in the details:
   - **Protocol**: `https://` (SSL is required)
   - **Domain**: Your domain name
   - **Site Name**: Fabify
   - **Admin Username**: Choose a secure username
   - **Admin Password**: Use a strong password
   - **Admin Email**: Your email address
5. Click **Install**
6. Wait for installation to complete (usually 2-5 minutes)

### 1.3 Verify WordPress Installation
1. Visit `https://yourdomain.com/wp-admin`
2. Log in with your admin credentials
3. You should see the WordPress dashboard

## 🎯 Step 2: WordPress Configuration

### 2.1 Basic Settings
1. Go to **Settings** → **General**
   - **Site Title**: Fabify
   - **Tagline**: Your Premium Marketplace
   - **Timezone**: Set your local timezone
   - **Date Format**: Your preference
   - **Time Format**: Your preference
2. Click **Save Changes**

### 2.2 Permalink Settings
1. Go to **Settings** → **Permalinks**
2. Select **Post name**
3. Click **Save Changes**

### 2.3 Install Required Plugins
Install these plugins from **Plugins** → **Add New**:

#### Essential Plugins:
1. **WooCommerce** - E-commerce functionality
2. **Stripe Payment Gateway** - Payment processing
3. **WooCommerce REST API** - API access
4. **JWT Authentication for WP REST API** - Secure API access

#### Recommended Plugins:
1. **Yoast SEO** - SEO optimization
2. **Wordfence Security** - Security protection
3. **WP Super Cache** - Performance optimization
4. **Contact Form 7** - Contact forms

### 2.4 Configure WooCommerce
1. After installing WooCommerce, follow the setup wizard:
   - **Store Details**: Fill in your business information
   - **Industry**: Choose "Retail/Online Store"
   - **Product Types**: Select "Physical products" and "Downloads"
   - **Business Details**: Complete address and tax information
   - **Shipping**: Set up shipping zones (we'll configure this later)
   - **Payments**: Enable Stripe (we'll configure this later)
   - **Extras**: Enable recommended features

## 💳 Step 3: Payment Setup

### 3.1 Configure Stripe
1. Go to **WooCommerce** → **Settings** → **Payments**
2. Click **Manage** on **Stripe**
3. Toggle **Enable Stripe** to **Yes**
4. Click **Create account** or **Connect** existing Stripe account
5. Follow the Stripe connect process
6. Set **Test Mode** to **Yes** initially for testing
7. Save changes

### 3.2 Get Stripe API Keys
1. Log in to your [Stripe Dashboard](https://dashboard.stripe.com)
2. Go to **Developers** → **API keys**
3. Copy **Publishable key** and **Secret key**
4. In WordPress, go to **WooCommerce** → **Settings** → **Payments** → **Stripe**
5. Enter the API keys
6. Save changes

## 🚚 Step 4: Shipping Setup

### 4.1 Create Shipping Zones
1. Go to **WooCommerce** → **Settings** → **Shipping**
2. Click **Add shipping zone**
3. **Zone name**: United States (or your target country)
4. **Zone regions**: Select your country
5. Save changes

### 4.2 Add Shipping Methods
1. Click on your newly created zone
2. Click **Add shipping method**
3. Choose **Flat rate**
4. Configure:
   - **Method title**: Standard Shipping
   - **Cost**: $9.99
   - **Tax status**: Taxable
5. Save changes

6. Add another shipping method for Express:
   - **Method title**: Express Shipping
   - **Cost**: $19.99
   - **Tax status**: Taxable

## 🔌 Step 5: Install Fabify Plugin

### 5.1 Upload Plugin Files
1. Download the `fabify-checkout` plugin files
2. In WordPress, go to **Plugins** → **Add New** → **Upload Plugin**
3. Select the `fabify-checkout.zip` file
4. Click **Install Now**
5. Click **Activate Plugin**

### 5.2 Configure Plugin Settings
1. Go to **Settings** → **Fabify Checkout**
2. Enter your Stripe credentials:
   - **Stripe Secret Key**: From Stripe dashboard
   - **Stripe Publishable Key**: From Stripe dashboard
   - **Stripe Webhook Secret**: Create in Stripe webhook settings
3. Save changes

### 5.3 Create Stripe Webhook
1. In Stripe Dashboard, go to **Developers** → **Webhooks**
2. Click **Add endpoint**
3. **Endpoint URL**: `https://yourdomain.com/wp-json/fabify/v1/stripe/webhook`
4. **HTTP method**: POST
5. **Events to send**: Select these events:
   - `payment_intent.succeeded`
   - `payment_intent.payment_failed`
   - `payment_intent.canceled`
6. Click **Create endpoint**
7. Copy the **Signing secret** and paste it in WordPress plugin settings

## 🛍️ Step 6: Product Setup

### 6.1 Create Product Categories
1. Go to **Products** → **Categories**
2. Create categories like:
   - Electronics
   - Fashion
   - Home & Garden
   - Sports & Outdoors

### 6.2 Add Sample Products
1. Go to **Products** → **Add New**
2. Fill in product details:
   - **Product name**: Product title
   - **Product description**: Detailed description
   - **Product short description**: Brief summary
   - **Regular price**: $99.99
   - **Sale price**: $79.99 (if on sale)
   - **Product image**: Upload product image
   - **Product gallery**: Add more images
   - **Categories**: Select appropriate categories
   - **Tags**: Add relevant tags
   - **Inventory**: Enable stock management
   - **Shipping**: Set weight and dimensions
3. Click **Publish**

### 6.3 Import Sample Data (Optional)
1. Install the **WooCommerce Sample Data** plugin
2. Import sample products to test functionality

## 🔐 Step 7: Security Setup

### 7.1 Generate API Keys
1. Go to **WooCommerce** → **Settings** → **Advanced** → **REST API**
2. Click **Add Key**
3. **Description**: Fabify Frontend
4. **Permissions**: **Read/Write**
5. Click **Generate API key**
6. Save the **Consumer Key** and **Consumer Secret**

### 7.2 Configure CORS (if needed)
Add this to your theme's `functions.php` file:

```php
add_action('rest_api_init', function() {
    remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
    add_filter('rest_pre_serve_request', function($value) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Authorization, Content-Type');
        return $value;
    });
}, 15);
```

## 🌐 Step 8: Connect Frontend

### 8.1 Update Frontend Environment
Create a `.env` file in your React app:

```env
VITE_WORDPRESS_URL=https://yourdomain.com
VITE_WOOCOMMERCE_CONSUMER_KEY=your_consumer_key
VITE_WOOCOMMERCE_CONSUMER_SECRET=your_consumer_secret
VITE_STRIPE_PUBLISHABLE_KEY=your_stripe_publishable_key
```

### 8.2 Test API Connection
Your frontend should now be able to:
- Fetch products from WordPress
- Manage shopping cart
- Process payments via Stripe
- Create orders

## 🧪 Step 9: Testing

### 9.1 Test Mode Testing
1. Enable test mode in Stripe
2. Use Stripe test cards:
   - **Success**: `4242 4242 4242 4242`
   - **Decline**: `4000 0000 0000 0002`
3. Test the complete checkout flow

### 9.2 Live Mode Testing
1. Disable test mode in Stripe
2. Use a real card for a small amount ($1)
3. Verify payment processing
4. Refund the test transaction

## 📊 Step 10: Monitoring

### 10.1 WordPress Monitoring
1. Monitor site performance in Hostinger dashboard
2. Check WooCommerce orders regularly
3. Monitor plugin updates

### 10.2 Stripe Monitoring
1. Monitor payments in Stripe dashboard
2. Set up email notifications for payment events
3. Review webhook delivery logs

## 🔧 Troubleshooting

### Common Issues:

#### API Connection Errors
- Check API keys are correct
- Verify WooCommerce REST API is enabled
- Check CORS headers
- Ensure HTTPS is properly configured

#### Payment Issues
- Verify Stripe account is verified
- Check webhook configuration
- Ensure SSL certificate is valid
- Test in Stripe test mode first

#### Performance Issues
- Enable caching plugins
- Optimize images
- Use CDN if available
- Monitor server resources

## 📞 Support

If you encounter issues:

1. **Hostinger Support**: Available 24/7 via live chat
2. **WordPress Documentation**: [wordpress.org/support](https://wordpress.org/support)
3. **WooCommerce Documentation**: [woocommerce.com/documentation](https://woocommerce.com/documentation)
4. **Stripe Support**: [stripe.com/support](https://stripe.com/support)

## 🚀 Going Live

Once everything is tested:

1. **Disable Test Mode**: In Stripe settings
2. **Update DNS**: Ensure domain is properly pointed
3. **SSL Certificate**: Verify SSL is active
4. **Backup**: Create a full site backup
5. **Monitor**: Watch for any issues in the first 24 hours

## 📈 Next Steps

After setup:

1. **Add Products**: Import or create your product catalog
2. **Configure Shipping**: Set up detailed shipping rules
3. **Setup Taxes**: Configure tax settings
4. **Customize Theme**: Match your brand colors
5. **SEO Optimization**: Configure SEO settings
6. **Email Setup**: Configure transactional emails

Your Fabify marketplace is now ready to accept payments! 🎉
# 🚀 Fabify Preview Guide

## Overview

This guide explains how to use the new preview functionality to see the Fabify theme design before deploying to WordPress.

## What's New

### 1. Quick Preview Section in README

The README now features a prominent "🚀 Quick Preview" section at the top with:
- Clickable badge buttons linking to localhost:3000 and this preview guide
- Clear instructions for multiple launch methods
- Visual styling with badges for better UX

### 2. Cross-Platform Launch Scripts

Two platform-specific preview scripts have been created:

#### **preview.sh** (Linux/Mac)
- Automatically detects if Node.js and npm are installed
- Checks if dependencies need to be installed
- Installs dependencies if needed
- Navigates to the frontend directory
- Starts the development server on port 3000
- Automatically attempts to open the application in the default browser

#### **preview.bat** (Windows)
- Same features as preview.sh, but optimized for Windows
- Uses Windows batch scripting conventions
- Provides user-friendly error messages
- Handles paths correctly on Windows systems

## Quick Start

### Windows Users
```bash
preview.bat
```

### Linux/Mac Users
```bash
./preview.sh
```

### Manual Method
```bash
cd frontend
npm install
npm start
```

## What You'll See

The preview shows:
- **Hero Carousel** - Rotating hero section with three slides
- **Product Categories** - Electronics, Fashion, Home, Beauty, etc.
- **Flash Sale Banner** - Promotional messaging
- **Product Sections**:
  - Today's Top Picks
  - Deals of the Day
  - Best Sellers
- **Shopping Cart** - Sidebar cart functionality (demo mode)
- **Services Bar** - Free shipping, returns, security, support
- **Footer** - Complete footer with links

## Technical Details

### Server Setup
- **Package**: http-server (lightweight Node.js HTTP server)
- **Port**: Automatically finds available port (starts checking from 3000)
- **Auto-open**: Browser opens automatically to the available port
- **Features**:
  - No build process required
  - Instant startup
  - Smart port detection (handles port conflicts automatically)

### Directory Structure
```
frontend/
├── .gitignore          # Excludes node_modules from git
├── README.md           # Frontend-specific documentation
├── package.json        # Node.js dependencies and scripts
├── package-lock.json   # Locked dependency versions
├── find-port.js        # Smart port detection script
└── public/
    └── index.html      # Preview HTML (copy of reference design)
```

## Features of the Launch Scripts

### Automatic Dependency Detection
Both scripts check for:
1. Node.js installation
2. npm installation
3. Existing node_modules folder

### Smart Installation
- If `node_modules` doesn't exist, dependencies are installed automatically
- If dependencies already exist, the script skips installation
- Clear progress messages throughout the process

### Error Handling
- Validates Node.js and npm are installed
- Provides helpful error messages if requirements are missing
- Graceful exit on errors

### User Experience
- **Emoji indicators** for visual feedback (✅, ❌, 📦, 🌐)
- **Progress messages** at each step
- **Clear instructions** for stopping the server (Ctrl+C)
- **Automatic browser opening** for convenience

## Troubleshooting

### Port Already in Use
The preview server automatically finds an available port, so you don't need to worry about port conflicts. The server will check ports starting from 3000 up to 3100 and use the first available one.

### Node.js Not Installed
Download and install Node.js from: https://nodejs.org/

### Permission Denied (Linux/Mac)
Make the script executable:
```bash
chmod +x preview.sh
```

### Dependencies Fail to Install
Clear npm cache and try again:
```bash
cd frontend
npm cache clean --force
rm -rf node_modules package-lock.json
npm install
```

## Differences from WordPress Theme

The preview shows the **static HTML design** that was used as the basis for the WordPress theme. 

Key differences:
- **No WordPress/WooCommerce** - This is a static preview
- **No database** - Products are hardcoded in the HTML
- **No user accounts** - Demo functionality only
- **No real cart** - Cart is visual only

For the **full WordPress theme** with WooCommerce functionality, follow the installation instructions in the main README.

## Benefits of the Preview

✅ **Quick Design Review** - See the theme design instantly without WordPress setup
✅ **Client Demos** - Show clients the design before deployment
✅ **Development Reference** - Reference for WordPress theme development
✅ **Cross-Platform** - Works on Windows, Mac, and Linux
✅ **No Dependencies** - Only requires Node.js (commonly installed for web development)

## Next Steps

After reviewing the preview:
1. If you like the design, proceed with WordPress installation
2. Follow the main README.md for WordPress theme installation
3. Install WooCommerce for full e-commerce functionality
4. Customize colors, menus, and content in WordPress

---

**Happy previewing! 🎨**

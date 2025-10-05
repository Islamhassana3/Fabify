#!/bin/bash

# Fabify Theme Preview Launcher (Linux/Mac)
# This script automatically sets up and launches the theme preview

echo "🚀 Fabify Theme Preview Launcher"
echo "================================="
echo ""

# Navigate to frontend directory
cd "$(dirname "$0")/frontend" || exit 1

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "❌ Node.js is not installed!"
    echo "Please install Node.js from https://nodejs.org/"
    exit 1
fi

echo "✅ Node.js detected: $(node --version)"
echo ""

# Check if npm is installed
if ! command -v npm &> /dev/null; then
    echo "❌ npm is not installed!"
    echo "Please install npm"
    exit 1
fi

echo "✅ npm detected: $(npm --version)"
echo ""

# Check if node_modules exists
if [ ! -d "node_modules" ]; then
    echo "📦 Installing dependencies..."
    npm install
    if [ $? -ne 0 ]; then
        echo "❌ Failed to install dependencies"
        exit 1
    fi
    echo "✅ Dependencies installed successfully!"
    echo ""
else
    echo "✅ Dependencies already installed"
    echo ""
fi

# Start the development server
echo "🌐 Finding available port and starting preview server..."
echo "📱 Your browser will open automatically..."
echo ""
echo "Press Ctrl+C to stop the server"
echo ""

npm start

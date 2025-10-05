@echo off
REM Fabify Theme Preview Launcher (Windows)
REM This script automatically sets up and launches the theme preview

echo.
echo ================================================
echo   Fabify Theme Preview Launcher
echo ================================================
echo.

REM Navigate to frontend directory
cd /d "%~dp0frontend"

REM Check if Node.js is installed
where node >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo X Node.js is not installed!
    echo Please install Node.js from https://nodejs.org/
    pause
    exit /b 1
)

for /f "tokens=*" %%i in ('node --version') do set NODE_VERSION=%%i
echo + Node.js detected: %NODE_VERSION%
echo.

REM Check if npm is installed
where npm >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo X npm is not installed!
    echo Please install npm
    pause
    exit /b 1
)

for /f "tokens=*" %%i in ('npm --version') do set NPM_VERSION=%%i
echo + npm detected: %NPM_VERSION%
echo.

REM Check if node_modules exists
if not exist "node_modules\" (
    echo Installing dependencies...
    call npm install
    if %ERRORLEVEL% NEQ 0 (
        echo X Failed to install dependencies
        pause
        exit /b 1
    )
    echo + Dependencies installed successfully!
    echo.
) else (
    echo + Dependencies already installed
    echo.
)

REM Start the development server
echo.
echo Starting preview server on http://localhost:3000
echo Your browser will open automatically...
echo.
echo Press Ctrl+C to stop the server
echo.

call npm start

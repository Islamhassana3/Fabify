#!/usr/bin/env node

// Script to find an available port and start the server
const net = require('net');
const { spawn } = require('child_process');

// Function to check if a port is available
function isPortAvailable(port) {
  return new Promise((resolve) => {
    const server = net.createServer();
    
    server.once('error', (err) => {
      if (err.code === 'EADDRINUSE') {
        resolve(false);
      } else {
        resolve(false);
      }
    });
    
    server.once('listening', () => {
      server.close(() => {
        resolve(true);
      });
    });
    
    server.listen(port, '127.0.0.1');
  });
}

// Function to find an available port starting from startPort
async function findAvailablePort(startPort = 3000, maxPort = 3100) {
  for (let port = startPort; port <= maxPort; port++) {
    if (await isPortAvailable(port)) {
      return port;
    }
  }
  throw new Error(`No available ports found between ${startPort} and ${maxPort}`);
}

// Function to start server with retry logic
async function startServerWithRetry(initialPort, maxRetries = 5) {
  let currentPort = initialPort;
  let attempt = 0;
  
  while (attempt < maxRetries) {
    try {
      console.log(`Attempt ${attempt + 1}/${maxRetries}: Starting server on http://localhost:${currentPort}`);
      console.log('');
      
      // Check if NO_BROWSER env var is set or if running in CI to disable auto-open
      const shouldOpenBrowser = !process.env.NO_BROWSER && process.env.CI !== 'true';
      const serverArgs = ['http-server', 'public', '-p', currentPort.toString()];
      
      if (shouldOpenBrowser) {
        serverArgs.push('-o');
      } else {
        console.log('Browser auto-open disabled (CI environment or NO_BROWSER set)');
        console.log('');
      }
      
      const serverProcess = spawn('npx', serverArgs, {
        stdio: 'inherit',
        shell: true
      });
      
      // Wait a moment to see if the server starts successfully
      await new Promise((resolve, reject) => {
        const timeout = setTimeout(() => {
          resolve(); // Server seems to be running
        }, 2000);
        
        serverProcess.once('error', (err) => {
          clearTimeout(timeout);
          reject(err);
        });
        
        // If process exits immediately, it likely failed
        serverProcess.once('exit', (code) => {
          if (code !== 0) {
            clearTimeout(timeout);
            reject(new Error(`Server exited with code ${code}`));
          }
        });
      });
      
      // If we get here, server started successfully
      return new Promise((resolve, reject) => {
        serverProcess.on('error', (err) => {
          console.error('Server error:', err);
          reject(err);
        });
        
        serverProcess.on('close', (code) => {
          resolve(code);
        });
      });
      
    } catch (error) {
      console.error(`Failed to start on port ${currentPort}:`, error.message);
      attempt++;
      
      if (attempt < maxRetries) {
        // Try to find next available port
        console.log('Looking for next available port...');
        console.log('');
        currentPort = await findAvailablePort(currentPort + 1, 3100);
        console.log(`Found available port: ${currentPort}`);
      } else {
        throw new Error(`Failed to start server after ${maxRetries} attempts`);
      }
    }
  }
}

// Main function
async function main() {
  try {
    const port = await findAvailablePort(3000, 3100);
    console.log(`Found available port: ${port}`);
    
    const exitCode = await startServerWithRetry(port);
    process.exit(exitCode);
    
  } catch (error) {
    console.error('Error:', error.message);
    process.exit(1);
  }
}

main();

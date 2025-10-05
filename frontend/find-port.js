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

// Main function
async function main() {
  try {
    const port = await findAvailablePort(3000, 3100);
    console.log(`Found available port: ${port}`);
    console.log(`Starting server on http://localhost:${port}`);
    console.log('');
    
    // Start http-server with the found port
    const serverProcess = spawn('npx', ['http-server', 'public', '-p', port.toString(), '-o'], {
      stdio: 'inherit',
      shell: true
    });
    
    serverProcess.on('error', (err) => {
      console.error('Failed to start server:', err);
      process.exit(1);
    });
    
    serverProcess.on('close', (code) => {
      process.exit(code);
    });
    
  } catch (error) {
    console.error('Error:', error.message);
    process.exit(1);
  }
}

main();

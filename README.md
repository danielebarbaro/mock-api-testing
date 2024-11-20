# Mock API Testing

A PHP project demonstrating how to create and test mock APIs using Swoole and Pest.

## 🎯 Features

- Simple HTTP client for API testing
- Swoole-based mock server
- Pest testing suite
- OpenAPI specification support
- Zero external dependencies for server implementation

## 🚀 Getting Started

### Prerequisites

- PHP 8.3
- Swoole extension
- Composer

### Installation

```bash
# Clone the repository
git clone https://github.com/danielebarbaro/mock-api-testing.git
cd mock-api-testing

# Install dependencies
composer install

# Start the mock server
php tests/swoole-test-server.php

# Run tests (in another terminal)
./vendor/bin/pest

# Mock API Testing

A PHP project demonstrating how to create and test mock APIs using Swoole and Pest.

## 🎯 Features

- Simple HTTP client for API testing
- Swoole-based mock server
- Pest testing suite
- OpenAPI specification support
- Docker support
- Automatic documentation with Redoc
- Zero external dependencies for server implementation

## 🚀 Getting Started

### Prerequisites

- PHP 8.3
- Swoole extension
- Composer
- Docker (optional)

### Installation

#### Local Development
```bash
# Clone the repository
git clone https://github.com/danielebarbaro/mock-api-testing.git
cd mock-api-testing

# Install dependencies
composer install

# Start the mock server
composer serve

# Run tests (in another terminal)
composer test
```

#### Using Docker
```bash
# Start all services
composer docker:up

# Run tests
composer docker:test

# Access the container
composer docker:shell

# Stop services
composer docker:down
```

### Installing Swoole

#### MacOS
```bash
brew install swoole
```

#### Ubuntu/Debian
```bash
sudo apt-get install php-swoole
```

#### Using PECL
```bash
sudo pecl install swoole
```

## 📖 Project Structure

```
mock-api-testing/
├── api/
│   ├── openapi.yml            # OpenAPI specification
│   └── redoc.html            # Generated documentation
├── src/
│   ├── HttpClient/
│   │   ├── Client.php
│   │   ├── ClientInterface.php
│   │   └── Exception/
│   │       └── ApiException.php
│   └── DTO/
│       ├── CityDTO.php
│       ├── StationDTO.php
│       └── TimeFrameDTO.php
├── tests/
│   ├── Feature/
│   │   └── HttpClient/
│   │       └── ClientTest.php
│   ├── Unit/
│   │   └── DTO/
│   │       ├── CityDTOTest.php
│   │       └── StationDTOTest.php
│   ├── Mock/
│   │   ├── Server/
│   │   │   └── swoole-test-server.php
│   │   └── Data/
│   │       └── mock-data.php
│   ├── Pest.php
│   └── TestCase.php
├── docker/
│   ├── Dockerfile
│   └── docker-compose.yml
└── composer.json
```

## 🔧 Available Commands

### Development
```bash
# Start mock server
composer serve

# Run tests
composer test
```

### Docker Commands
```bash
# Start services
composer docker:up

# Run tests in Docker
composer docker:test

# Access container shell
composer docker:shell

# Stop services
composer docker:down
```

## 📚 API Documentation

The project includes a complete OpenAPI specification describing all available endpoints.

### Available Endpoints

- `GET /translations/stations` - Get stations translations
- `GET /it/rally/stations/{id}` - Get rally station by ID
- `GET /it/rally/stations` - Get all rally stations
- `GET /it/rally/timeframes/{stationIds}` - Get timeframes for stations

### Mock Server

The mock server will be available at:
- http://localhost:9501

## 🧪 Testing

This project uses Pest for testing. Tests are located in the `tests` directory and organized into:
- Feature tests: `tests/Feature/`
- Unit tests: `tests/Unit/`
- Mock server: `tests/Mock/`

### Running Tests
```bash
# Run all tests
composer test

# Run with coverage
composer test:coverage

# Run tests in Docker
composer docker:test
```

## 🔨 Development

### Local Development Setup
1. Install dependencies
2. Start the mock server
3. Run tests
4. Start documentation server

```bash
composer install
composer serve
composer test
```

### Docker Development Setup
1. Start all services
2. Access the documentation
3. Test the API

```bash
composer docker:up
# Test endpoints at http://localhost:9501
```

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👤 Author

Daniele Barbaro

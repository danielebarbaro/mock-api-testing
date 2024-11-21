# Mock API Testing for the PUGTO meetup

A PHP project demonstrating how to create and test mock APIs using OpenSwoole and Pest.

The event link is: [MeetUp](https://www.meetup.com/it-IT/pug-torino/events/304246466)  

Slides: [Download](slides/Swoole_and_Pest_a_modern_testing_approach-PUGTO_Daniele_Barbaro.pdf)   

I recommend checking out the repo: [Suggest a trip to me](https://github.com/danielebarbaro/suggest-me-a-trip)  

## 🎯 Features

- Simple HTTP client for API testing
- OpenSwoole-based mock server
- Pest testing suite
- OpenAPI specification support
- Docker support
- Automatic documentation with Redoc
- Zero external dependencies for server implementation

## 🚀 Getting Started

### Prerequisites

- PHP 8.3
- OpenSwoole extension
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

### Installing OpenSwoole

> **Note**: OpenSwoole and Swoole cannot be installed simultaneously. If you have Swoole installed, you need to remove it first.

#### Remove Swoole (if installed)
```bash
# MacOS
brew uninstall swoole
pecl uninstall swoole

# Ubuntu/Debian
sudo apt-get remove php-swoole

# Verify removal
php -m | grep swoole
```

#### Install OpenSwoole

#### MacOS
```bash
brew install openswoole/tap/openswoole
```

#### Ubuntu/Debian
```bash
sudo apt-get install php-openswoole
```

#### Using PECL
```bash
sudo pecl install openswoole
```

#### Verify Installation
```bash
php --ri openswoole
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
│   │   │   └── openswoole-test-server.php
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

## 🚀 OpenSwoole Features

OpenSwoole brings several advantages to this project:

- Event-driven, non-blocking I/O
- Built-in multi-threading
- Coroutines support
- Better memory management
- Improved performance over traditional PHP servers
- Enhanced configuration options
- Better compatibility with modern PHP features

### Key Differences from Swoole
- Community-driven development
- More frequent updates and better community support
- Enhanced configuration options
- Improved error handling
- Better PHP 8.x compatibility

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
```

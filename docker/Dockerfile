FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
	brotli \
	libbrotli-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Install OpenSwoole specifically
RUN pecl install openswoole \
    && docker-php-ext-enable openswoole

# Verify OpenSwoole installation
RUN php -m | grep openswoole

# Verify OpenSwoole version
RUN php --ri openswoole

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Expose port for Swoole server and docs
EXPOSE 9501

FROM dunglas/frankenphp:1-php8.2-alpine

# Set working directory
WORKDIR /app

# Install dependencies
RUN apk add --no-cache \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    oniguruma-dev \
    icu-dev

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd
RUN docker-php-ext-configure intl && docker-php-ext-install intl

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN apk add --no-cache nodejs npm

# Copy composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --no-dev

# Copy package files
COPY package.json package-lock.json ./
RUN npm install

# Copy the rest of the application code
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Generate optimized autoloader and run other post-install scripts
RUN composer dump-autoload --optimize && composer run-script post-autoload-dump

# Build frontend assets
RUN npm run build

# Set environment to production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Expose port 443 for HTTPS
EXPOSE 80 443

# Start FrankenPHP
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"] 
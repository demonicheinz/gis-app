FROM dunglas/frankenphp:1-php8.2-alpine

WORKDIR /app

# Install dependencies
RUN apk add --no-cache \
    libpng-dev libjpeg-turbo-dev freetype-dev zip \
    jpegoptim optipng pngquant gifsicle \
    unzip git curl libzip-dev icu-dev nodejs npm

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files first
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copy package files
COPY package.json package-lock.json ./
RUN npm ci --omit=dev

# Copy application files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Build frontend assets
RUN npm run build

# Set environment to production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Salin .env.example ke .env
RUN cp .env.example .env

# Generate application key
RUN php artisan key:generate

# Expose port 80 for HTTP
EXPOSE 80

# Start FrankenPHP
CMD ["frankenphp", "serve"]

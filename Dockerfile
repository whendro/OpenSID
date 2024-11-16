# Dockerfile
FROM webdevops/php-nginx:8.1-alpine

RUN docker-php-source extract

# Install necessary packages and PHP extensions
RUN apk update && apk add --no-cache \
    # phpize \
    autoconf \
    g++ \
    make \
    imagemagick \
    imagemagick-dev \
    imagemagick-libs \
    imagemagick-c++ \
    imagemagick-doc \
    libzip-dev \
    curl-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    openssl-dev \
    tidyhtml-dev tidyhtml-libs
    # ca-certificates \
    # && update-ca-certificates

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip curl pdo pdo_mysql tidy

# Copy application files
COPY . /app
# COPY docker/php.ini /usr/local/etc/php/php.ini

# Set working directory
WORKDIR /app

# Install Composer
RUN curl --silent --show-error "https://getcomposer.org/installer" | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --working-dir=/app

# Expose the default port for nginx
EXPOSE 80

# Start the services
CMD ["supervisord"]

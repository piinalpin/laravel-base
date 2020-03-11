FROM php:7.2-fpm

COPY . /var/www

WORKDIR /var/www
RUN chmod -R 777 vendor 
RUN chmod -R 777 storage 
RUN chmod -R 777 bootstrap 
RUN chmod 777 public

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --ignore-platform-reqs 

COPY .env.docker /var/www/.env

RUN php artisan cache:clear
RUN php artisan config:clear


RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd
RUN docker-php-ext-configure mysqli --with-mysqli=mysqlnd 
RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Memory Limit
RUN echo "memory_limit=2048M" > $PHP_INI_DIR/conf.d/memory-limit.ini
RUN echo "max_execution_time=1800" >> $PHP_INI_DIR/conf.d/memory-limit.ini
RUN echo "post_max_size=50M" >> $PHP_INI_DIR/conf.d/memory-limit.ini
RUN echo "upload_max_filesize=50M" >> $PHP_INI_DIR/conf.d/memory-limit.ini

# Display errors in stderr
RUN echo "display_errors=stderr" > $PHP_INI_DIR/conf.d/display-errors.ini

# Disable PathInfo
RUN echo "cgi.fix_pathinfo=0" > $PHP_INI_DIR/conf.d/path-info.ini

# Disable expose PHP
RUN echo "expose_php=0" > $PHP_INI_DIR/conf.d/path-info.ini

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
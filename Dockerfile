#FROM php:8.3-fpm
#
#WORKDIR /var/www
#
#RUN apt-get update && apt-get install -y \
#    git \
#    curl \
#    libpng-dev \
#    libjpeg-dev \
#    libfreetype6-dev \
#    zip \
#    unzip
#
#RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
#    && docker-php-ext-install gd \
#    && docker-php-ext-install pdo pdo_mysql
#
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#
#COPY . /var/www
#
#RUN composer install
#
#RUN chown -R www-data:www-data /var/www \
#    && chmod -R 755 /var/www
#
#EXPOSE 9000
#
#CMD ["php-fpm"]

# -------------------------------------

FROM php:8.3-fpm

WORKDIR /var/www

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm

# Configurer et installer les extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    pdo \
    pdo_mysql \
    zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
COPY . /var/www

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances JavaScript et builder
RUN npm install && npm run build

# Fixer les permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

EXPOSE 9000

CMD ["php-fpm"]

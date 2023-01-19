FROM php:8.1-fpm
WORKDIR /var/www/html

# Updating and install of required packages
RUN apt-get update \
&& apt-get install -y nano zip unzip libzip-dev default-mysql-client npm wget \
&& docker-php-ext-install zip pdo_mysql

# Install Node.js version manager
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs

RUN cd /var/www/html
# RUN npm install --legacy-peer-deps

# build manifest file in public
# RUN npm run prod
# RUN npm run dev

# Install composer for the application dependencies
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /bin/composer
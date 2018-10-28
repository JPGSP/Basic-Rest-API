FROM php:7.0.28-fpm

MAINTAINER JPG

# Install dependencies for PHP
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get update
RUN apt-get install -y openssl git unzip iputils-ping telnet

# Download and install Composer
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer --version

# Enable PHP APC / APCu Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN pecl install apcu
RUN pecl install apcu_bc

RUN docker-php-ext-enable apc
RUN docker-php-ext-enable apcu

RUN rm /usr/local/etc/php/conf.d/docker-php-ext-apc.ini

RUN echo "extension=apcu.so" > /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini
RUN echo "extension=apc.so" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

# Enable PHP MySQL Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN docker-php-ext-install pdo pdo_mysql

# Enable PHP ZIP Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get install -y zip unzip zlib1g-dev

RUN docker-php-ext-install zip

# Enable PHP OPCache Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN docker-php-ext-install opcache

# Enable PHP INTL Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get install -y zlib1g-dev libicu-dev g++

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Enable PHP BCMath Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN docker-php-ext-configure bcmath
RUN docker-php-ext-install bcmath

# Enable PHP MCrypt Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get install -y libmcrypt-dev

RUN docker-php-ext-configure mcrypt
RUN docker-php-ext-install mcrypt

# Enable PHP PCNTL Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN docker-php-ext-install pcntl

# Enable PHP GD Extension
# ~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get install -y libpng-dev

RUN docker-php-ext-install gd

# Enable PHP IMagick Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN apt-get install -y libmagickwand-dev

RUN pecl install imagick

RUN docker-php-ext-enable imagick

# Enable PHP XDebug Extension
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~

RUN pecl install xdebug

RUN docker-php-ext-enable xdebug

RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

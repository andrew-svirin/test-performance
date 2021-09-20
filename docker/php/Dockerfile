FROM php:7.3-cli

RUN apt-get update && apt-get install -y libmcrypt-dev libpq-dev libxml2-dev zlib1g-dev git unzip \
    libpng-dev librabbitmq-dev libssh-dev libzip-dev sudo

RUN pecl install xdebug mcrypt-1.0.2 && \
    docker-php-ext-enable xdebug mcrypt && \
    docker-php-ext-install intl bcmath pdo pdo_mysql zip

#Install composer
RUN ln -sf /usr/local/bin/php /usr/bin/php && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --version=2.0.13 --filename=composer

#
ARG USER_ID=1000
ARG GROUP_ID=1000

RUN userdel -f www-data \
    && if getent group www-data ; then groupdel www-data; fi \
    && groupadd -g ${GROUP_ID} www-data \
    && useradd -l -u ${USER_ID} -g www-data www-data && echo "www-data:www-data" | chpasswd && adduser www-data sudo \
    && install -d -m 0755 -o www-data -g www-data /home/www-data

RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

RUN chown --changes --silent --no-dereference --recursive ${USER_ID}:${GROUP_ID}  \
    /home/www-data  \
    /var/run/php-fpm \
    /var/lib/php/sessions \
    /var/log \
    /var/www || true

#RUN usermod --shell /bin/bash www-data
USER www-data
#

WORKDIR /var/www/test-performance

CMD "/home/www-data/entrypoint.sh"
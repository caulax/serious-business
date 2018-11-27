FROM php:7.1.0-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV TZ "Europe/Kiev"

# set time
RUN apk add --update tzdata && \
    cp /usr/share/zoneinfo/${TZ} /etc/localtime && \
    echo ${TZ} > /etc/timezone

RUN apk add --no-cache --virtual .persistent-deps \
        git \
        icu-libs \
        acl \
        zlib \ 
        bash

RUN set -xe \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        icu-dev \
        zlib-dev \
        openssl \
        pcre-dev \
    && docker-php-ext-install \
        intl \
        mbstring \
        pdo_mysql \
        pdo \
        zip \
    && pecl install \
    && apk del .build-deps

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/*

# install lib for post mosquitto 
RUN apk add --no-cache --virtual .build-deps build-base && \
    apk add --no-cache --virtual .build-deps mosquitto-dev && \
    apk add --update --virtual autoconf && \
    yes '' | pecl install -f Mosquitto-alpha

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/app

COPY ./src/composer.json ./src/composer.lock ./

RUN composer install -no --no-scripts 

COPY ./src ./

COPY ./run.sh ./

RUN chmod +x ./run.sh

RUN chmod -R 777 ./var/cache/ ./var/sessions/ ./var/logs/

#RUN pecl install xdebug-2.5.5 && docker-php-ext-enable xdebug
# RUN chown -R www-data:www-data ./
# RUN HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)
# RUN setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX var/cache var/logs
# RUN setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX var/cache var/logs

ADD ./deploy/php/php-fpm.conf /usr/local/etc/php-fpm.conf
ADD ./deploy/php/php.ini /usr/local/etc/php/php.ini

# RUN mkdir -p var/jwt
# RUN openssl genrsa -out var/jwt/private.pem -aes256 -passout pass:${API_JWT_KEY_PASS_PHRASE} 4096
# RUN openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem -passin pass:${API_JWT_KEY_PASS_PHRASE}

ENTRYPOINT ["sh", "./run.sh"]

CMD ["php-fpm", "-F"]

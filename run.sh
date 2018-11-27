#!/usr/bin/env bash

# php app/console doctrine:database:create
# php app/console doctrine:schema:update --force
# php app/console cache:clear --env=prod
# source /etc/apache2/envvars

# chown -R www-data:www-data app/cache
# chown -R www-data:www-data app/logs
# rm -rf app/log/* app/cache/*
# chmod 777 -R app/cache app/logs

mkdir -p var/jwt
openssl genrsa -out var/jwt/private.pem -aes256 -passout pass:${API_JWT_KEY_PASS_PHRASE} 4096
openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem -passin pass:${API_JWT_KEY_PASS_PHRASE}

chown -R www-data:www-data var/jwt/

curl https://gist.githubusercontent.com/caulax/3ede3dfad116b81e674753d41640edde/raw > env.sh
bash env.sh app/config/parameters.yml.dist

composer install

exec "$@"

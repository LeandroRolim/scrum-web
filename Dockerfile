FROM node:12

copy . .

RUN yarn install
RUN yarn run prod


FROM phpswoole/swoole:latest

RUN docker-php-ext-install pdo_mysql pdo_pgsql

WORKDIR /var/www

# Copy existing application directory permissions
COPY . .
COPY --from=0 ./public/css ./public/css
COPY --from=0 ./public/js ./public/js
RUN composer install \
    --no-interaction \
    --no-dev

EXPOSE 8000

CMD ["php", "artisan", "swoole:http", "start"]

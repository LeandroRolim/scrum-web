FROM node:12 as frontend

# RUN useradd -m scrum
# USER scrum

copy . .

RUN yarn install
RUN yarn run prod

FROM composer:2 as vendor
COPY composer.json ./
COPY composer.lock ./
RUN composer install --no-interaction --no-dev --ignore-platform-reqs --no-scripts

FROM phpswoole/swoole:latest


RUN docker-php-ext-install pdo_mysql pdo_pgsql
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

WORKDIR /var/www

RUN useradd -m scrum
USER scrum

# Copy existing application directory permissions
COPY --chown=scrum:scrum . .
COPY --from=frontend --chown=scrum:scrum ./public/css ./public/css
COPY --from=frontend --chown=scrum:scrum ./public/js ./public/js
COPY --from=vendor --chown=scrum:scrum /app/vendor/ /var/www/vendor/
RUN composer dumpautoload
RUN php artisan clear
RUN php artisan package:discover --ansi

EXPOSE 8000

CMD ["php", "artisan", "swoole:http", "start"]

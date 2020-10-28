FROM node:12

copy . .

RUN yarn install
RUN yarn run prod


FROM phpswoole/swoole:latest

WORKDIR /var/www

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www


# Copy existing application directory permissions
COPY . .
COPY --from=0 ./public/css ./public/css
COPY --from=0 ./public/js ./public/js
RUN mkdir vendor
RUN composer install \
    --no-interaction \
    --quiet \
    --no-dev

USER www


EXPOSE 8000

ENTRYPOINT ["php", "artisan", "swoole:http", "start"]

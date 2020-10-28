FROM node:12

copy . .

RUN yarn install
RUN yarn run prod


FROM phpswoole/swoole:latest

WORKDIR /var/www

# Copy existing application directory permissions
COPY . .
COPY --from=0 ./public/css ./public/css
COPY --from=0 ./public/js ./public/js
RUN composer install \
    --no-interaction \
    --quiet \
    --no-dev

EXPOSE 8000

ENTRYPOINT ["php", "artisan", "swoole:http", "start"]

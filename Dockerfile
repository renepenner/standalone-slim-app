FROM php:7.3.6-alpine

RUN apk update && \
    apk --no-cache add git

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

COPY composer.* ./
RUN composer install --no-dev --optimize-autoloader --quiet --no-interaction

COPY public public/
COPY src src/


EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "./public", "./public/index.php"]

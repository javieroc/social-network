FROM ferroxido/linux-php-server

COPY . /opt/data

ENV APP_HOME /var/www/html
RUN mkdir -p /opt/data/public && \
    rm -r /var/www/html && \
    ln -s /opt/data/public $APP_HOME

WORKDIR /opt/data

RUN composer install

RUN chown -R www-data:www-data \
        /opt/data/storage \
        /opt/data/bootstrap/cache

RUN php artisan optimize

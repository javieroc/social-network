FROM ferroxido/apache-server
ENV APP_HOME /var/www/html
RUN mkdir -p /opt/data/public && \
    rm -r /var/www/html && \
    ln -s /opt/data/public $APP_HOME
WORKDIR $APP_HOME

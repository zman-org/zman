FROM ubuntu:latest

ENV DEBIAN_FRONTEND noninteractive

# get some basic tools
RUN apt-get update && apt-get install -y \
        git curl vim zip unzip

# install php
RUN apt-get update && apt-get install -y software-properties-common && \
        add-apt-repository ppa:ondrej/php && \
        apt-get update && \
        apt-get install -y php7.3 php7.3-xml php7.3-mbstring php7.3-dev automake autoconf

# install XDebug
RUN cd /tmp && \
        curl -LO http://xdebug.org/files/xdebug-2.7.1.tgz && \
        tar -xvzf xdebug-2.7.1.tgz && \
        cd xdebug-2.7.1 && \
        phpize && \
        ./configure && \
        make && \
        cp modules/xdebug.so /usr/lib/php/20180731 && \
        echo "zend_extension = /usr/lib/php/20180731/xdebug.so" >> /etc/php/7.3/cli/php.ini

# install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

# create user
RUN useradd -ms /bin/bash zmanim
USER zmanim

# get the app
RUN git clone https://github.com/zmanim/zman.git /home/zmanim/zman

# install app deps
RUN cd /home/zmanim/zman && \
        cp composer.json /tmp && \
        cp composer.lock /tmp && \
        cd /tmp && \
        composer update --optimize-autoloader

# cache the app deps
RUN cp -a /tmp/vendor /home/zmanim/zman

WORKDIR /home/zmanim/zman

# run the tests
CMD ["vendor/bin/phpunit", "--coverage-html", "test-results"]

FROM php:8.1.3-apache

LABEL maintainer="Nice <kanyarut@wecraft.co.th>" \
      version="1.0"

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libmagickwand-dev --no-install-recommends

RUN pecl install imagick \
	  && docker-php-ext-enable imagick

RUN docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite negotiation \
    && docker-php-ext-install opcache

RUN apt-get install -y unzip libzip-dev zlib1g-dev \
    && docker-php-ext-install zip

RUN pecl install redis && docker-php-ext-enable redis

RUN apt-get install -y libxml2-dev \
    && CFLAGS="-I/usr/src/php" docker-php-ext-install xmlreader

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

RUN mkdir /srv/app
RUN chown www-data:www-data /srv/app
COPY .docker/webapp/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY .docker/webapp/php.ini /usr/local/etc/php/

ENV DEBIAN_FRONTEND=noninteractive
ENV PYTHON_VERSION="3.6.5"



WORKDIR /srv/app
COPY /src .
RUN chmod -R 755 /srv/app/storage
# RUN pip install pycaret==2.3.10
# Install core packages
# RUN apt-get update
# RUN apt-get install -y build-essential checkinstall software-properties-common llvm cmake wget git nano nasm yasm zip unzip pkg-config \
#      libncursesw5-dev libssl-dev libsqlite3-dev tk-dev libgdbm-dev libc6-dev libbz2-dev

# #Install Python 3.6.5
# RUN wget https://www.python.org/ftp/python/${PYTHON_VERSION}/Python-${PYTHON_VERSION}.tar.xz \
#     && tar xvf Python-${PYTHON_VERSION}.tar.xz \
#     && rm Python-${PYTHON_VERSION}.tar.xz \
#     && cd Python-${PYTHON_VERSION} \
#     && ./configure \
#     && make altinstall \
#     && cd / \
#     && rm -rf Python-${PYTHON_VERSION}
# RUN apt-get install -y python3-pip
# RUN pip install pandas
# RUN pip install pycaret
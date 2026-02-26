FROM php:8.4.5-fpm


RUN apt-get update && apt-get install -y \
    git \
    curl \
    default-libmysqlclient-dev \
    libmariadb-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libssl-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install \
    gd \
    pdo \
    pdo_mysql \
    ctype \
    fileinfo \
    zip \
    bcmath && \
    rm -rf /var/lib/apt/lists/*


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs


RUN apt-get update && apt-get install -y supervisor



COPY ./src /var/www/html


WORKDIR /var/www/html

# Instala dependencias de NPM y compila los assets con Vite
RUN npm install && npm run build

EXPOSE 9000 5173

CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]


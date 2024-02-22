FROM php:8.1-fpm

# Define as variáveis de ambiente para o usuário do sistema
# Defina seu usuário, ex: user=kardec
ARG user=jaya
ARG uid=1000

# Instalar dependências
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev

RUN apt-get install -y postgresql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo pdo_pgsql

# Obter Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria um novo usuário do sistema que rodará o Composer e o Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user

# Definindo as variáveis de ambiente HOME e PATH para o usuário $user.
ENV HOME /home/$user
ENV PATH $HOME/.composer/vendor/bin:$PATH

# Define o diretório home do usuário do sistema que rodará o Composer e o Artisan
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user


# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Definir diretório de trabalho
WORKDIR /var/www

# Define o usuário como o usuário padrão para executar comandos
USER $user

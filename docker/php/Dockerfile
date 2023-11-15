FROM php:8.2-fpm-alpine

ARG USER
ARG USER_ID
ARG GROUP_ID

WORKDIR /var/www

RUN apk update && apk upgrade && apk add  --no-cache $PHPIZE_DEPS \
    && apk add --no-cache linux-headers git \
    ca-certificates \
    libressl-dev \
    libffi-dev \
    curl \
    zip \
    unzip \
    vim \
    bash \
    icu-dev 


RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-configure intl && docker-php-ext-install intl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./conf.d/xdebug.ini "${PHP_INI_DIR}/conf.d"

# ENV NVM_DIR=/usr/local/nvm
# ENV NODE_VERSION=20.9.0
# RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash
# RUN . "$NVM_DIR/nvm.sh"  \
#     && nvm install ${NODE_VERSION} \
#     && nvm alias default v${NODE_VERSION} \
#     && nvm use default
# ENV NODE_PATH ${NVM_DIR}/v${NODE_VERSION}/lib/node_modules
# ENV PATH ${NVM_DIR}/v${NODE_VERSION}/bin:${PATH}
# RUN nvm current
RUN apk add --update nodejs npm && npm install -g pnpm

# RUN corepack enable
# RUN corepack prepare pnpm@latest --activate
RUN node --version
RUN npm --version
RUN pnpm --version
# RUN pnpm --version

# RUN addgroup -g $GROUP_ID $USER  
# RUN adduser -s /bin/bash -G $USER -u 1337 -S $USER

# USER $USER
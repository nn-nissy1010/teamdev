FROM php:7.2-fpm

# タイムゾーン(東京)
ENV TZ Asia/Tokyo

# PHP 7.2(Debian Stretch)のサポート終了に伴うリポジトリの書き換え
# これを行わないと apt-get update で exit code 100 になります
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list && \
    sed -i 's|security.debian.org/debian-security|archive.debian.org/debian-security|g' /etc/apt/sources.list && \
    sed -i '/stretch-updates/d' /etc/apt/sources.list

# パッケージのインストールとPHP拡張のセットアップ
RUN apt-get update && \
    apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libpq-dev && \
    docker-php-ext-install pdo_mysql pdo_pgsql mysqli

# MailHog(mhsendmail)の設定
RUN curl -sSLO https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 && \
    chmod +x mhsendmail_linux_amd64 && \
    mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail && \
    echo 'sendmail_path = "/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025"' > /usr/local/etc/php/conf.d/sendmail.ini

FROM php:8.1-apache

# General settings
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Anti-DDOS System
RUN apt-get update && apt-get install -y sudo libapache2-mod-evasive

COPY http/httpd.conf /usr/local/apache2/conf/httpd.conf
COPY http/evasive.conf /etc/apache2/mods-available/evasive.conf
COPY http/localized-error-pages.conf /etc/apache2/conf-enabled/localized-error-pages.conf
COPY http/ban_ip.sh /usr/bin/ban_ip.sh
RUN chmod 777 /usr/bin/ban_ip.sh
RUN mkdir -p /usr/log
RUN touch /var/log/block.log
RUN chmod 777 /var/log/block.log

# Gettext libraries (for translations)
RUN apt-get update && apt-get install -y gettext locales nano
RUN docker-php-ext-install gettext
RUN sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen && \
    sed -i -e 's/# it_IT.UTF-8 UTF-8/it_IT.UTF-8 UTF-8/' /etc/locale.gen && \
    sed -i -e 's/# es_ES.UTF-8 UTF-8/es_ES.UTF-8 UTF-8/' /etc/locale.gen && \
    sed -i -e 's/# fr_FR.UTF-8 UTF-8/fr_FR.UTF-8 UTF-8/' /etc/locale.gen && \
    dpkg-reconfigure --frontend=noninteractive locales && \
    update-locale LANG=en_US.UTF-8



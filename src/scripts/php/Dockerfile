FROM php:8.1-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update && apt-get install -y libapache2-mod-evasive

COPY http/httpd.conf /usr/local/apache2/conf/httpd.conf
COPY http/evasive.conf /etc/apache2/mods-available/evasive.conf
COPY http/ban_ip.sh /usr/bin/ban_ip.sh
RUN chmod 777 /usr/bin/ban_ip.sh
RUN mkdir -p /usr/log
RUN touch /var/log/block.log
RUN chmod 777 /var/log/block.log

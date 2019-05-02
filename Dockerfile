FROM php:7.2-apache

MAINTAINER macooa <ralf.behnstedt@macooa.com>

COPY lib/ /var/www/html/

RUN chmod -R 755 /var/www/html

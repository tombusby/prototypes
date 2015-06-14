#!/usr/bin/env bash

apt-get update
apt-get install -yf apache2 php5 php5-curl
service apache2 stop
rm -rf /var/www/*
ln -fs /vagrant /var/www/html
a2enmod rewrite
a2enmod headers
rm -fr /var/lock/apache2
service apache2 start

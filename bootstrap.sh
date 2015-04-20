#!/usr/bin/env bash

sudo apt-get update

sudo apt-get install software-properties-common python-software-properties -y --force-yes

sudo add-apt-repository ppa:chris-lea/node.js -y
sudo add-apt-repository ppa:ondrej/php5 -y

sudo apt-get update

sudo apt-get install -y unzip vim git-core curl wget build-essential python-software-properties
sudp apt-get install git -y
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
sudo apt-get -y install mysql-server --force-yes

sudo apt-get install sqlite3 libsqlite3-dev -y --force-yes

sudo apt-get install apache2 -y --force-yes
sudo apt-get install php5-mysql -y --force-yes
sudo apt-get install php5-cli -y --force-yes
sudo apt-get install php5-fpm -y --force-yes
sudo apt-get install php5-curl -y --force-yes
sudo apt-get install php5-gd -y --force-yes
sudo apt-get install php5-cgi  --force-yes
sudo apt-get install php5-mcrypt -y --force-yes
sudo apt-get install php5-pgsql -y --force-yes

sudo apt-get install nfs-common portmap -y --force-yes

#Install/configure xdebug
sudo apt-get install php5-xdebug -y --force-yes
sudo echo "xdebug.remote_enable = 1" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.remote_host = 10.0.2.2" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.remote_port=9000" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.remote_handler=dbgp" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.idekey=PHPSTORM" >> /etc/php5/fpm/conf.d/xdebug.ini

sudo echo "xdebug.remote_enable = 1" >> /etc/php5/fpm/conf.d/20-xdebug.ini
sudo echo "xdebug.remote_host = 10.0.2.2" >> /etc/php5/fpm/conf.d/20-xdebug.ini
sudo echo "xdebug.remote_port=9000" >> /etc/php5/fpm/conf.d/20-xdebug.ini
sudo echo "xdebug.remote_handler=dbgp" >> /etc/php5/fpm/conf.d/20-xdebug.ini
sudo echo "xdebug.idekey=PHPSTORM" >> /etc/php5/fpm/conf.d/20-xdebug.ini

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo rm -rf /etc/apache2/sites-available/
sudo rm -rf /etc/apache2/sites-enabled/*
sudo ln -s /root/sites-available /etc/apache2/sites-available
sudo sed -i "s/127.0.0.1:9000/\/var\/run\/php5-fpm.sock/g" "/etc/php5/fpm/pool.d/www.conf"


sudo service php5-fpm restart
sudo a2ensite default
sudo a2enmod rewrite
sudo service apache2 restart
sudo apt-get install libapache2-mod-php5 -y --force-yes
sudo apt-get install npm -y --force-yes
sudo apt-get install nodejs -y --force-yes
cd /var/www
npm install -g bower
npm install -g grunt-cli

#install redis
cd ~
sudo wget http://download.redis.io/redis-stable.tar.gz
tar xvzf redis-stable.tar.gz
cd redis-stable
make
sudo cp src/redis-server /usr/local/bin/
sudo cp src/redis-cli /usr/local/bin/
sudo mkdir /etc/redis
sudo mkdir /var/redis
sudo cp utils/redis_init_script /etc/init.d/redis_6379
sudo cp redis.conf /etc/redis/6379.conf
sudo mkdir /var/redis/6379
sudo sed -i "s/daemonize no/daemonize yes/g" "/etc/redis/6379.conf"
sudo sed -i "s/dir .\//dir \/var\/redis\/6379/g" "/etc/redis/6379.conf"
sudo update-rc.d redis_6379 defaults
/etc/init.d/redis_6379 start

sudo mysql -uroot -ppassword -e 'create database `database`;'

curl -L http://install.ohmyz.sh | sh
alias artisan = "php artisan"

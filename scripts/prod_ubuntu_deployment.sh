echo "install tools ..."
# sudo apt-get install python-software-properties
# sudo add-apt-repository ppa:ondrej/php5

sudo apt-get update

sudo apt-get install git

echo "install apache2 ..."
sudo apt-get install apache2
echo "install php5 ..."
sudo apt-get install libapache2-mod-php5 php5 php5-gd php5-mysql

# not install mysql-server in prod environment
# sudo apt-get install mysql-server 

echo "checkout xshowroom codes"
cd ~
git clone https://github.com/xshowroom/web.git

# modify apache2 config
#
# sudo vi /etc/apache2/sites-available/000-default.conf

<Directory /home/xshowroom/web/www>
	Options FollowSymLinks
	DirectoryIndex index.php
	AllowOverride all
	Require all granted
</Directory>

# <VirtualHost *:80>
	ServerAdmin arwutang@hotmail.com
  	DocumentRoot /home/xshowroom/web/www
# </VirtualHost>

# open apache rewrite
sudo a2enmod rewrite

# modify php config for upload file size & error log
#
# sudo vi /etc/php5/apache2/php.ini

# post_max_size = 2M
# upload_max_filesize = 2M
# error_log = /var/log/php-error.log

echo "restart apache2"
sudo apachectl restart

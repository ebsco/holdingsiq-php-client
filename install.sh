#!/bin/bash

sudo apt-get update
sudo apt-get install php-xdebug

XDEBUG_PATH=$( find /usr -name 'xdebug.so' | head -1 )
sudo truncate -s 0 /etc/php/7.0/mods-available/xdebug.ini
echo "; xdebug
zend_extension=\"$XDEBUG_PATH\"
xdebug.remote_connect_back = 1
xdebug.remote_autostart = 0
xdebug.remote_enable = 1
xdebug.remote_handler = \"dbgp\"
xdebug.remote_port = 9000
xdebug.remote_mode = \"req\"
xdebug.var_display_max_children = 512
xdebug.var_display_max_data = 1024
xdebug.remote_host = \"192.168.33.10\"
xdebug.idekey = \"SCOTCHDEBUG\"
xdebug.var_display_max_depth = 10" >> /etc/php/7.0/mods-available/xdebug.ini

VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot /var/www/public
    AllowEncodedSlashes On
    <Directory /var/www/public>
        Options +Indexes +FollowSymLinks
        DirectoryIndex index.php index.html
        Order allow,deny
        Allow from all
        AllowOverride All
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default

a2enmod rewrite
service apache2 restart

MYSQL=$(cat <<EOF
[mysql]

[mysqld_safe]
socket          = /var/run/mysqld/mysqld.sock
nice            = 0

[mysqld]
user            = mysql
pid-file        = /var/run/mysqld/mysqld.pid
socket          = /var/run/mysqld/mysqld.sock
port            = 3306
basedir         = /usr
datadir         = /var/lib/mysql
tmpdir          = /tmp
lc-messages-dir = /usr/share/mysql
key_buffer_size         = 16M
max_allowed_packet      = 16M
thread_stack            = 192K
thread_cache_size       = 8
myisam-recover-options  = BACKUP
query_cache_limit       = 1M
query_cache_size        = 16M
log_error = /var/log/mysql/error.log
expire_logs_days        = 10
max_binlog_size   = 100M
sql_mode = "STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"
EOF
)
echo "${MYSQL}" > /etc/mysql/my.cnf
service mysql restart


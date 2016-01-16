echo "go to root"
cd /mnt/xshowroom/web/

echo "clean all"
git reset --hard

echo "sync code from server"
git pull

echo replace prod configuraion
mv /mnt/xshowroom/web/www/application/config/database.prod.php /mnt/xshowroom/web/www/application/config/database.php


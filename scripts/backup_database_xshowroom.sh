
backup_file_name=/home/tangxiaotao/workspace/xshowroom/database_backup/full_xshowroom_bak_$(date -d today +"%Y_%-m_%-d-%H_%M_%S").sql

echo 'full backup xshowroom to file: '$backup_file_name.gz

mysqldump -hxiaotao.cloudapp.net -P3306 -uroot -p123456 xshowroom -R | gzip > $backup_file_name.gz

echo 'backup success'

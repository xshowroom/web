images_file_path=/home/dev_root/xshowroom/web/www/data
backup_file_name=/home/tangxiaotao/workspace/xshowroom/database_backup/full_image_bak_$(date -d today +"%Y_%-m_%-d-%H_%M_%S")

echo 'full backup xshowroom images to file: '$backup_file_name.zip

cp -r $images_file_path  $backup_file_name
rm -rf $backup_file_name/tmp

zip -r $backup_file_name.zip $backup_file_name
rm -rf $backup_file_name

echo 'backup images success'

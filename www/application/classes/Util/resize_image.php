<?php defined('SYSPATH');
/**
 * @author xiaotao
 */

function resize($filename, $percent)
{
    // 获取新的尺寸
    list($width, $height, $type) = getimagesize($filename);
    $new_width = $width * $percent;
    $new_height = $height * $percent;

    // 重新取样
    $image_p = imagecreatetruecolor($new_width, $new_height);
    switch ($type) {
        case 1:
            $image = imagecreatefromgif($filename);
            break;
        case 2:
            $image = imagecreatefromjpeg($filename);
            break;
        case 3:
            $image = imagecreatefrompng($filename);
            break;
        default:
            $image = imagecreatefromjpeg($filename);
            break;
    }
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    $output = $filename;

    // 输出
    imagejpeg($image_p, $output, 100);

    return $output;
}


/*
 * Shrink the size of images
 *
 * Example
 * php resize_image.php *_medium* 200 /home/dev_root/xshowroom/web/www/data/ true
 */

# define variables
$pattern = $argv[1];
$targetSize = $argv[2];
$workingDir =  $argv[3];
$isProcess = (bool)$argv[4];

echo 'resize pattern: ' . $pattern.', resize target: ' . $targetSize . ', working on: ' . $workingDir;

$dir=opendir($workingDir.".");

//files to process
$fileList = array();

while (($file = readdir($dir))!= false)
{
    $filename = $workingDir. '/' .$file;
    if (is_file($filename)) {
        if (preg_match($pattern, $filename)) {
            $fileSize = filesize($filename);

            if($fileSize > $targetSize * 1024) {
                $fileList[] = $filename;
            }
        }
    }
}
closedir($dir);

echo 'below images will be processed: ';
print_r($fileList);

foreach($fileList as $processFile) {
    $fileSize = filesize($processFile);

    if($fileSize > $targetSize * 1024) {
        if ($isProcess) {
            echo "\nProcess: " . $processFile;

            $resizeImagePath = resize($processFile, 0.8);
            $imagePath = $resizeImagePath;
        }
    }
}
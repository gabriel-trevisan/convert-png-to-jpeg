<?php

$path = '../images';

$directories = array_diff(scandir($path), ['.', '..']);

$countDirectories = count($directories);

foreach ($directories as $index => $directory) {
    $originalFile = "../images/{$directory}/profile.png";
    $outputFile = "../images/$directory/profile.jpg";
    $quality = 100;

    $image = imagecreatefrompng($originalFile);
    $result = imagejpeg($image, $outputFile, $quality);
    imagedestroy($image);

    if(!$result){
        echo "Error convert id $directory image";
    }

    if($index > $countDirectories){
        echo "Finished!";
    }
}
<?php

require '../vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

$path = '../images';

$directories = array_diff(scandir($path), ['.', '..']);

$countDirectories = count($directories);

set_time_limit(1200);
foreach ($directories as $directory) {
    try {    
        $originalFile = "../images/{$directory}/profile.png";
        $outputFile = "../images/$directory/profile.jpg";
        $outputFile50 = "../images/$directory/profile-50.jpg";
        $quality = 100;

        $image = Image::make($originalFile);
        $image->encode('jpg', 100);
        $image->save($outputFile);

        //Resize image
        $image->resize(50, 50); 
        $image->save($outputFile50);

        $image->destroy();

    } catch (Exception $e){
        echo "<br>";
        echo $e->getMessage()." Directory:".$directory;
    }
}

echo "Finished";
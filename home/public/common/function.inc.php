<?php
function verify()
{
    header('Content-type:image/jpeg');
    $width = 120;
    $height = 40;
    $img = imagecreatetruecolor($width, $height);
    $colorBG = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
    $colorReg = imagecolorallocate($img, 187, 255, 170);
    $colorPoint = imagecolorallocate($img, 0, 0, 0);
    $colorLine = imagecolorallocate($img, rand(150, 255), rand(150, 255), rand(150, 255));
    $colorString = imagecolorallocate($img, rand(10, 100), rand(10, 100), rand(10, 100));
    imagefill($img, 0, 0, $colorBG);
    imagerectangle($img, 1, 1, 119, 39, $colorReg);
    for ($i = 0; $i < 100; $i++) {
        imagesetpixel($img, rand(10, 110), rand(1, 39), $colorPoint);
    }
    for ($i = 0; $i < 5; $i++) {
        imageline($img, rand(0, 50), rand(0, 40), rand(60, 120), rand(0, 40), $colorLine);
    }
//imagestring($img,14,20,20,'90849',$colorString);
    imagettftext($img, 20, 0, rand(2, 12), rand(20, 30), $colorString, 'Candara', '90849');
    imagejpeg($img);
    imagedestroy($img);
}
?>

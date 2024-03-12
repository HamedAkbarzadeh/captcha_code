<?php
require_once __DIR__.'\randomShape.php';
header("Content-Type: image/png");

//
$shape = new randomShape();

$img = imagecreatetruecolor(200 , 100);

//color
$red =  imagecolorallocate($img , 255 ,0 ,0);
$white =  imagecolorallocate($img , 255 ,255 ,255);
$black =  imagecolorallocate($img , 0 ,0 ,0);

//set image
imagefill($img,0 ,0 ,$white);

//find width , height of image
$imgW = imagesx($img);
$imgH = imagesy($img); 

imageantialias($img, true);

//set shape to image 
$shape->randomCirle($img , $imgW , $imgH , 'light_green');
$shape->randomCirle($img , $imgW , $imgH , 'light_red');
$shape->randomCirle($img , $imgW , $imgH , 'light_blue');
$shape->randomCirle($img , $imgW , $imgH , 'light_yellow');
$shape->randomCirle($img , $imgW , $imgH , 'light_yellow');
// $shape->randomRectangle($img , $imgW , $imgH , 'light_yellow');

//set text 
$x = 0;
$captcha_code = randomStr(5);
for ($i=0; $i < 5; $i++) { 
    $x +=30;
    $y = rand(30,70);
    imagestring($img , 5 , $x ,$y ,$captcha_code[$i] , $black);
} 

imagepng($img);
imagedestroy($img);


//return captcha code
function captchaCode(){
    global $captcha_code;

    return $captcha_code;
}

//generate text
function randomStr($count = 1){
    $available_alpha = "123456789abcdefghijklmnopqrstuvwxyz";
    $aplpha_Counter = strlen($available_alpha);
    $randStr = "";

    for($i = 0; $i < $count ; $i++){
        $x = rand(0 , $aplpha_Counter - 1);
        $randStr .= substr($available_alpha,$x ,1); 
    }

    return $randStr;
}
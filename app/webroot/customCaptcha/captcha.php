<?php
//staring session
session_start();

//Initializing PHP variable with string
$captchanumber = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789abcdefghijklmnpqrstuvwxyz';

//Getting first 6 word after shuffle
$captchanumber = substr(str_shuffle($captchanumber), 0, 6);

//Initializing session variable with above generated sub-string
$_SESSION["code"] = $captchanumber;
//$this->Session->write("code" ,$captchanumber);

//Generating CAPTCHA
$image = imagecreatefromjpeg("bj.jpg");
$foreground = imagecolorallocate($image, 175, 199, 200); //font color
imagestring($image, 5, 45, 8, $captchanumber, $foreground);
header('Content-type: image/png');
imagepng($image);
?>

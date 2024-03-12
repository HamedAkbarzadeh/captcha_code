<?php

class randomShape{
    private $name;
    private $cx;
    private $cy;
    private $width;
    private $height; 
    private $color =[
        'light_red' => '214,64,64',
        'light_blue' => '64,166,214',
        'light_green' => '64,214,124',
        'light_yellow' => '199, 214, 64',
    ];

    function colorallocate($img , $color){
        $RGBCode = explode(',',$color);
        return imagecolorallocate($img , $RGBCode[0] , $RGBCode[1] , $RGBCode[2]);
    }
    public function rectangle($img ,$x1 , $y1 , $x2 , $y2 ,$color){
        imagefilledrectangle($img , $x1 , $y1 , $x2 , $y2 , $this->colorallocate($img , $this->color[$color]));
    } 

    public function circle($img ,$cx , $cy , $radius ,$color){
        imagefilledellipse($img , $cx , $cy , $radius , $radius , $this->colorallocate($img , $this->color[$color]));
    } 
    function randomCirle($img , $imgWidth , $imgHeight , $color){
        $width = rand(0 , $imgWidth);
        $height = rand(0 , $imgHeight);
        $radius = rand(30 , $imgWidth / 10);
        imagefilledellipse($img , $width , $height , $radius , $radius , $this->colorallocate($img , $this->color[$color]));

    }
    function randomRectangle($img , $imgWidth , $imgHeight , $color){
        $left = rand(0 , $imgWidth  );
        $right = rand(0 , $imgWidth);
        $top = rand(0 , $imgHeight);
        $bottom = rand(0 , $imgHeight);
        imagefilledrectangle($img , $left , $top , $right , $bottom , $this->colorallocate($img , $this->color[$color]));


    }
}
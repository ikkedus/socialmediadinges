<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 18-1-18
 * Time: 22:35
 */

namespace App\Helpers;


use Imagick;
use ImagickPixel;

class ImagickHelper
{
    private $image;
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        $this->image = new Imagick($url);
    }

    public function rotate($direction)
    {
        $degree = 90;
        if($direction !=="CW")
        {
            $degree = $degree * -1;
        }
        $this->image->rotateimage(new ImagickPixel('#00000000'),$degree);
        return $this;
    }
    public function simpelSize()
    {
        $size = $this->size();
        return[$size['width'],$size['height']];
    }
    public function crop($coordinates)
    {
        //top, left, bottom, right
        $size = $this->size();

        $top = (float)$coordinates[0];
        $left = (float)$coordinates[1];
        $bottom = (float)$coordinates[2];
        $right = (float)$coordinates[3];
        $width = round($left-$right,2);
        $height = round($top-$bottom,2);
        $newWidth = round($size['width']*$width);
        $newHeight = round($size['height']*$height);

        $this->image->cropImage((int)$newWidth*-1,(int)$newHeight*-1,(int)round($size['width']*$left),(int)round($size['height']*$top));
        return $this;
    }
    public function size()
    {
        return $this->image->getImageGeometry();
    }
    public function save($url = "")
    {
        if(!$url){
            $url = $this->url;
        }else{
            $this->url = $url;
        }
        $this->image->writeImage($url);
        return $this;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 30-10-17
 * Time: 22:16
 */

namespace App\Models;


abstract class ContentBlockType
{
    const Text = 0;
    const Image = 1;
    const Youtube = 2;
    const Slider = 3;
}
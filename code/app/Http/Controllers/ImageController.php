<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 18-1-18
 * Time: 21:41
 */

namespace App\Http\Controllers;

use App\Helpers\ImagickHelper;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\File;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('image')->store('public/images');

        $image = new ImagickHelper(storage_path("app/".$file));

        return json_encode(["url"=>"/".str_replace('public','storage',$file),"size"=>$image->simpelSize()]);
    }
    public function clear(Request $request)
    {
        //todo delete temp
        return dd($request);
    }
    public function rotate(Request $request)
    {
        $direction = $request->direction;
        $url = str_replace('storage','public',explode('?',$request->url)[0]);
        $image = new ImagickHelper(storage_path("app/".$url));
        $image->rotate($direction)->save();
        return json_encode(["url"=>$request->url,"size"=>$image->simpelSize()]);

    }
    public function crop(Request $request)
    {
        $crop =$request->crop;
        $width =$request->width;
        $url = str_replace('storage','public',explode('?',$request->url)[0]);
        $image = new ImagickHelper(storage_path("app/".$url));
        $image->crop(explode(',',$crop))->save();

        return json_encode(["url"=>$request->url,"size"=>$image->simpelSize()]);
    }


}
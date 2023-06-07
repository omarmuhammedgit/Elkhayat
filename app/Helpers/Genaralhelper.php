<?php
use Illuminate\Support\Facades\Config;
function uploadImage($folder,$image)
{
    $extention=strtolower($image->extension());
    $fileNmae=time().rand(100,999).'.'.$extention;
    $image->getClientOrignalName=$fileNmae;
    $image->move($folder,$fileNmae);

}






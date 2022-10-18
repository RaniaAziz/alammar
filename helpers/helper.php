<?php
define('PER_PAGE', 10);
use Illuminate\Support\Arr;

function getTranslationsJs()
{
    $translationFile = resource_path('lang/'.app()->getLocale().'.json');

    if (! is_readable($translationFile)) {
        $translationFile = resource_path('lang/'.app('translator')->getFallback().'.json');
    }

    return ['translations' => json_decode(file_get_contents($translationFile), true)];
}

function saveMultipleSizeImage($image, $direction)
{
    $img_name = $image->hashName('');
    $img = \Image::make($image);

    $img->resize(2000, null, function ($constraint) {
        $constraint->aspectRatio();
    });

    \Illuminate\Support\Facades\Storage::disk('public')->put($direction.'/2000/'.$img_name, (string) $img->encode());

//    $img->resize(1000, null, function ($constraint) {
//        $constraint->aspectRatio();
//    });
//    \Illuminate\Support\Facades\Storage::disk('public')->put($direction.'/1000/'.$img_name, (string) $img->encode());

    $img->resize(600, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    \Illuminate\Support\Facades\Storage::disk('public')->put($direction.'/600/'.$img_name, (string) $img->encode());

    $img->resize(300, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    \Illuminate\Support\Facades\Storage::disk('public')->put($direction.'/300/'.$img_name, (string) $img->encode());

    return $img_name;
}

function fileExists($direction) {
    return File::exists('/'. $direction);
}

function saveCustomSizeImage($image, $direction, $width, $height)
{
    $img_name = $image->hashName('');
    $img = \Image::make($image);

    File::exists(public_path() .'/'. $direction) or File::makeDirectory(public_path() .'/'. $direction, 755, true);

    $img->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    })->save(public_path().'/' . $direction . '/' .$img_name);

    return $img_name;
}

function saveFile($file, $direction)
{
    $mime = $file->getClientOriginalExtension();
    $dir = '/uploads/'. $direction .'/'. date('Y') . '/' . date('m');
    File::exists(public_path().'/uploads/'. $direction .'/') or File::makeDirectory(public_path().'/uploads/'.$direction, 0755, true);
    File::exists(public_path() .'/'. $dir) or File::makeDirectory(public_path(). $dir, 0755, true);
    $file_name = rand(10000, 99999) . '.' . $mime;
    $file->move(public_path().$dir, $file_name);
    return $dir.'/'.$file_name;
}

function errorResponse($messages, $status = 404)
{
    return response()->json([
        'error_message' => $messages,
    ], $status);
}
function meta($key, $value = null)
{
    if($value) {
        \App\Classes\Meta::set($key, $value);
    }
    return \App\Classes\Meta::get($key);
}

function meta_data($page_title = '', $breadcrumbs_title = '', $breadcrumbs = [])
{
    meta('page-title', $page_title);
    meta('breadcrumbs-title', $breadcrumbs_title);
    meta('breadcrumbs', $breadcrumbs);
}

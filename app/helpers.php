<?php

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

if (!function_exists('getArchive')) {
    function getArchive()
    {
        return DB::select(DB::raw('SELECT count(`title`) as countTitle , month , year from posts
group by month,year order by year desc'));

    }
}

if (!function_exists('getBestPost')) {
    function getBestPost()
    {
        return Post::all()->sortByDesc('view')->first();
    }
}


if (!function_exists('faTOen')) {
    function faTOen($string)
    {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9'));
    }
}
if (!function_exists('enToFa')) {
    function enToFa($string)
    {
        return strtr($string, array('0' => '۰', '1' => '۱', '2' => '۲', '3' => '۳', '4' => '۴', '5' => '۵', '6' => '۶', '7' => '۷', '8' => '۸', '9' => '۹'));
    }
}

function checkActive($route){
  return Route::currentRouteName() == $route ? "active" : "";
}

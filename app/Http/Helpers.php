<?php


use TCG\Voyager\Facades\Voyager;

if(!function_exists('getSiteTitle')){
    function getSiteTitle(){
        $title = Voyager::setting('title');
        return $title;
    }
}
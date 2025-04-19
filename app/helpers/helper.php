<?php

use App\Models\Home;
use Illuminate\Support\Facades\Cache;
use App\Models\SiteContent;
use App\Models\SocialLink;

if (!function_exists('getSiteContent')) {
    function getSiteContent($column)
    {
        return SiteContent::select($column)->first();
    }
}

if (!function_exists('getSocialLinks')) {
    function getSocialLinks($column)
    {

        return SocialLink::select($column)->first();
    }
}


if (!function_exists('getHomeContent')) {
    function getHomeContent($column)
    {
        return Home::select($column)->first ();
    }
}

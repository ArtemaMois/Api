<?php

namespace App\Services;

class Part
{
    public static function html__parts($htmlName)
    {
        require_once 'views/htmlcomponents/' . $htmlName . '.php';
    }
    public static function css_parts($cssName)
    {
        require_once 'assets/css/' . $cssName . '.php';
    }

    public static function js_parts($jsFile)
    {
        require_once "views/pages/js/" . $jsFile . '.php';
    }
}

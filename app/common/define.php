<?php
define("DB_SERVER", "localhost"); 
define("DB_USER", "root"); 
define("DB_PASSWORD", "");
define("DB_NAME", "qldsv");


define('SITE_ROOT','/final/');

if (defined('CLI') == false)
{
    if (!preg_match('/^http:/', SITE_ROOT) OR ! preg_match('/^https:/', SITE_ROOT))
    {
        if (empty($_SERVER['HTTPS']))
        {
            define('FULL_SITE_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . SITE_ROOT);
        }
        else
        {
            define('FULL_SITE_ROOT', 'https://' . $_SERVER['HTTP_HOST'] . SITE_ROOT);
        }
    }
    else
    {
        define('FULL_SITE_ROOT', SITE_ROOT);
    }
}

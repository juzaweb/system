<?php

use Tadcms\System\Models\Config;

if (!file_exists('is_url')) {
    /**
     * Check the string a url
     *
     * @param string $url
     * @return bool
     * */
    function is_url($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }
        
        return true;
    }
}

/**
 * Get client ip
 *
 * @return string
 * */
function get_client_ip()
{
    // Check Cloudflare support
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        return $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    
    // Get ip from server
    return request()->ip();
}

function get_config($key, $default = null)
{
    return Config::getConfig($key, $default);
}

function set_config($key, $value)
{
    return Config::setConfig($key, $value);
}

function upload_url($path, $default = null)
{
    $storage = Storage::disk(config('file-manager.upload_disk'));
    if ($storage->exists($path)) {
        return $storage->url($path);
    }
    
    if ($default) {
        return $default;
    }
    
    return asset('vendor/tadcms/images/avatar.png');
}

function path_url(string $url)
{
    if (!is_url($url)) {
        return $url;
    }
    
    return parse_url($url)['path'];
}

function get_date($date, $format = null, $default = null)
{
    $format = $format ?? 'Y-m-d H:i:s';

    if (is_string($date)) {
        return date($format, strtotime(
            str_replace('/', '-', $date)
        ));
    }

    if (is_a($date, '\Illuminate\Support\Carbon')) {
        return $date->format($format);
    }

    return $default;
}

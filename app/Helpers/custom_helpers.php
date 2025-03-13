<?php

if (!function_exists('custom_asset')) {
    function custom_asset($path, $secure = null)
    {
        $assetPrefix = env('ASSET_PREFIX', '');

        $prefix = $assetPrefix ? rtrim($assetPrefix, '/') . '/' : '';

        return url($prefix . $path, [], $secure);
    }
}

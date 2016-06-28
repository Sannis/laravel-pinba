<?php

if (!function_exists('pinba')) {
    /**
     * Get the LaravelPinba instance
     *
     * @return \Sannis\Pinba\LaravelPinba
     */
    function pinba()
    {
        return app('pinba');
    }
}

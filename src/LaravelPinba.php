<?php

namespace Sannis\Pinba;

class LaravelPinba
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct($app = null)
    {
        if (!$app) {
            $app = app(); // Fallback when $app is not given
        }
        $this->app = $app;
    }
}

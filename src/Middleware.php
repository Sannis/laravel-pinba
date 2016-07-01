<?php

namespace Sannis\Pinba;

use Closure;

class Middleware
{
    const UNKNOWN_SCRIPT_NAME = '<unknown>';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $return = $next($request);

        if (extension_loaded('pinba')) {
            $route = $request->route();
            if ($route) {
                $script_name = $route->getUri();
            } else {
                $script_name = self::UNKNOWN_SCRIPT_NAME;
            }

            pinba_script_name_set($script_name);
        }

        return $return;
    }
}

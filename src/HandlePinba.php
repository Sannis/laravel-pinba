<?php

namespace Sannis\Pinba;

use Closure;

class Middleware
{
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
            pinba_script_name_set($request->route()->getUri());
        }

        return $return;
    }
}

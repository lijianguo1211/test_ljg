<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next)
    {
        //echo __CLASS__;
        if (!session('admin_id')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}

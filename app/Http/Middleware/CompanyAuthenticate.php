<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CompanyAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('company')->check()) {
                return $this->auth->shouldUse('company');
            }
      

        $this->unauthenticated($request, ['company']);
    }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('company.login');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CompanyAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('agent')->check()) {
                return $this->auth->shouldUse('agent');
            }
      

        $this->unauthenticated($request, ['agent']);
    }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('company.login');
        }
    }
}

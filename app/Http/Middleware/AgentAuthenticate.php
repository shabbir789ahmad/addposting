<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AgentAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('labour')->check()) {
                return $this->auth->shouldUse('labour');
            }
      

        $this->unauthenticated($request, ['labour']);
    }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('agent.login');
        }
    }
}

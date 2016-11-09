<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

class RedirectIfAdmin
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
      if (is_null($request->user()) || !$request->user()->isAdmin())
          {
              return redirect('/home');
          }

          return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\GeneralTrait;

class CheckAuth
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //better if use username and password from env file

        if (!isset($request->username) || $request->username != "tagerly_task" || 
        !isset($request->password) || $request->password != "B3Nn6RxS6Qx" ) {
            return $this->returnErrorMessage(403,"you don't have permission for this api");
        }
        return $next($request);
    }
}

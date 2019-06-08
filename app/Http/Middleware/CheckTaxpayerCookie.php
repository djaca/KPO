<?php

namespace KPO\Http\Middleware;

use Illuminate\Support\Facades\Cookie;
use KPO\Taxpayer;
use Closure;

class CheckTaxpayerCookie
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
        if (!$taxpayer = Taxpayer::find($request->cookie('taxpayerId'))) {
            Cookie::queue(Cookie::forget('taxpayerId'));

            return redirect()->route('taxpayers.index');
        }

        $request->merge(compact('taxpayer'));

        return $next($request);
    }
}

<?php

namespace KPO\Http\Middleware;

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
        dd($request->cookie('taxpayer'));
        if (!Taxpayer::find($request->cookie('taxpayer'))) {
            return redirect()->route('taxpayers');
        }

        return $next($request);
    }
}

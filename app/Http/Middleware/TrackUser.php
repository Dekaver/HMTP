<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TrackUser as TUser;

class TrackUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        date_default_timezone_set("Asia/Kuching");
        $t = TUser::firstOrCreate([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ],[
            'date' => date("Y-m-d")
        ]);
        $t->date = date("Y-m-d");
        $t->save();

        return $next($request);
    }
}
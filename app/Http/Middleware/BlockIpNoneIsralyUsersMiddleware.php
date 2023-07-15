<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIpNoneIsralyUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    

    public function handle(Request $request, Closure $next)
    {
      
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

        $userIp =  $request->ip() ;
        $ipLocationObj = json_decode(file_get_contents("https://api.iplocation.net/?ip={$userIp}" ));
        
        if ( $ipLocationObj->country_code2  != "IL") {
            return response()->json(['message' => "You don't have permission to access this website. your ip ->" . $userIp ]);
        }
        return $next($request);
    
    }
}

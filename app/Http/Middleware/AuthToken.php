<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthToken
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
        $token = $request->hasHeader('Authorization')? $request->header('Authorization') : '';
        
        if(!$token || !$usuario = User::where('token',$token)->first() ){
            return response()->json(['msg'=>'Key not found'],401);
        }

        $request->merge([
            'user' => $usuario
        ]);

        return $next($request);
    }
}

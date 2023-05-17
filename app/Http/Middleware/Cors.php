<?php


namespace App\Http\Middleware;


use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Accept, Authorization, X-Requested-With, Application'
        ];

        $response = $next($request);
        foreach($headers as $key => $value)
        {
            $response->headers->set($key, $value);
        }
        return $response;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class SetDatabaseStore
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
      config(['database.connections.mysqlstore' => [
        'driver'    => 'mysql',
        'host'      => session('DB_IP'),
        'port'      => session('DB_Port'),
        'database'  => session('DatabaseName'),
        'username'  => session('DB_ID'),
        'password'  => session('DB_Password'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        'strict'    => false,
      ]]);
      return $next($request);
    }
}

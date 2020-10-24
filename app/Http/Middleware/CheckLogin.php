<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
    $request_path_parts = explode("/",$request->path());
    $first_path_part = $request_path_parts[0];
    if( isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]== true )
      return $next($request);
    else if( $request->path() != 'config/login' && $first_path_part == "config" )
      return redirect('/config/login');
    else
      return $next($request);
  }
}
?>

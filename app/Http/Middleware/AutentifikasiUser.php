<?php namespace App\Http\Middleware;

use Closure;

class AutentifikasiUser
{
	private $auth;
	public function __construct()
	{
		$this->auth = app('auth');
	}
	public function handle($request, Closure $next)
	{
		if ($this->auth->check())
		{
			return $next($request);
			# code...
		}
		return redirect('login2')->withErrors('Silahkan Login Terlebih Dahulu');
	}
}
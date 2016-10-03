<?php namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
class AuthenticateAdmin {
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;
	/**
	 * Create a new filter instance.
	 *
	 */
	public function __construct()
	{
		$this->auth = Auth::admin();
	}
	
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			return redirect()->guest('admin/login');
		}
		return $next($request);
	}
}
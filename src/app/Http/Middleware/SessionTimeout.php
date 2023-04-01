<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;

class SessionTimeout
{
    protected $session;
    protected $timeout;

    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = config('session.lifetime') * 60;
    }

    public function handle($request, Closure $next)
    {
        if ($this->session->has('lastActivityTime')) {
            $elapsedTime = time() - $this->session->get('lastActivityTime');

            if ($elapsedTime > $this->timeout) {
                $this->session->forget('lastActivityTime');
                auth()->logout();

                return redirect()->route('login')->with('timeout', 'セッションがタイムアウトしました。再度ログインしてください。');
            }
        }

        $this->session->put('lastActivityTime', time());

        return $next($request);
    }
}
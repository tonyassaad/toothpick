<?php

namespace App\Http\Middleware;

use App\Helper\ResponseOutputHelper;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class CheckRole extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = '')
    {
        try {
            /**
             * Attempt to authenticate a user via the token in the request.
             */
            $this->authenticate($request);
            $loggedInuserId = Auth::user()->id;
            if (! Auth::check()) {
                return ResponseOutputHelper::unAuthorized();
            }
            /**get the first role */
            $userRoles = Auth::user()->roles->pluck('name');

            if (null != $userRoles) {
                if ($role != 'common') {
                    if ($role != $userRoles[0] || (Auth::user()->access_token != $request->bearerToken())) {
                        return ResponseOutputHelper::unAuthorized();
                    }
                }
            }

            return $next($request);
        } catch (TokenExpiredException $e) {
            return ResponseOutputHelper::customBadRequestMessage($e->getMessage());
        } catch (JWTException $e) {
            return ResponseOutputHelper::unAuthorized();
        } catch (BadRequestHttpException $e) {
            return ResponseOutputHelper::unAuthorized();
        } catch (UnauthorizedHttpException $e) {
            return ResponseOutputHelper::customBadRequestMessage($e->getMessage());
        }
    }
}

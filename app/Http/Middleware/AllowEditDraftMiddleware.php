<?php

namespace App\Http\Middleware;

use App\Enums\ClaimStatusEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowEditDraftMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->claim->status != ClaimStatusEnum::DRAFT && !is_null($request->claim->submitted_at))
            return abort(403, 'Not Allow');
            
        return $next($request);
    }
}

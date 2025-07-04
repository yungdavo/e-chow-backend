<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * This method is used by Laravel to handle auth errors.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Handle API routes properly
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthenticated.'
            ], 401);
        }

        // Default fallback for web routes (optional)
        return redirect()->guest('login'); // you can also replace this with a hardcoded URL if needed
    }
}
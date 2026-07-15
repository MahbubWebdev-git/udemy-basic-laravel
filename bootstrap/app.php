<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Render হোস্টিংয়ের সমস্ত রিভার্স প্রক্সিকে ট্রাস্ট করার নির্দেশ (Fixes 403 Invalid Signature)
        $middleware->trustProxies(at: '*');
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

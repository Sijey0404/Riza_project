<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->append([
            'maintenance'=>\App\Http\Middleware\DownForMaintenanceMW::class,
        ]);

        // $middleware->append([
        //     \App\Http\Middleware\AnnouncementMW::class,
        // ]);

        $middleware->group('mwheaders',[
            \App\Http\Middleware\MiddlewareOne::class,
            \App\Http\Middleware\MiddlewareTwo::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

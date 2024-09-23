<?php
protected $middlewareGroups = [
    'web' => [
        // ostatní middleware...
        
    ],
    
    'api' => [
        // ostatní middleware...
        \App\Http\Middleware\VerifyCsrfToken::class,
    ],
];
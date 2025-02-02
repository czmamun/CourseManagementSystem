<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'webhook/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],
    'allowed_origins' => ['https://example.com', 'https://www.example.com'],
    'allowed_origins_patterns' => ['https://*.example.com'],
    'allowed_headers' => ['Content-Type', 'Authorization', 'X-Requested-With'],
    'exposed_headers' => ['X-Custom-Header'],
    'max_age' => 86400,
    'supports_credentials' => true,
];

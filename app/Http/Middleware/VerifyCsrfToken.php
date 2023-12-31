<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/student-num-exists',
        '/register',
        '/login',
        '/signOut',
        '/updatePoints',
        '/updateProfile',
        '/uploadPhoto',
        '/post',
        '/save-code',
        '/delete-user',
        '/delete-admin',
        '/post-backend',
        '/update-backend-status',
        '/post-frontend',
        '/delete-backend-post',
        '/update-backend-post',
        '/delete-frontend-post',
        '/update-frontend-post',
        '/update-frontend-status',
        '/post-multiplechoice',
        '/update-multiplechoice-post',
        '/delete-multiplechoice-post',
        '/update-multiplechoice-status'
    ];
}

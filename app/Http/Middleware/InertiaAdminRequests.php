<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InertiaAdminRequests extends HandleInertiaRequests
{
    protected $rootView = 'admin';
}

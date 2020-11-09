<?php

use Illuminate\Support\Facades\Route;

function activeClass($routeName)
{
    return Route::currentRouteName() === $routeName ? 'active' : '';
}

<?php

use Illuminate\Support\Facades\Route;

Route::middleware('demo')->get('userssss', function () {
    return config('common.common');
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Native\Laravel\Notification;

class TestController extends Controller
{
    public function notify(Request $request)
    {
        Notification::title('Hello from NativePHP')
            ->message('This is a detail message coming from your Laravel app.')
            ->show();

        return Redirect::to(route('dashboard'));
    }
}

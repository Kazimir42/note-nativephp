<?php

namespace App\Http\Controllers;

use Native\Laravel\Client\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Native\Laravel\Notification;
use Native\Laravel\Dialog;

class TestController extends Controller
{
    public function notify(Request $request)
    {
        $client = new Client();
        $notification = new Notification($client);

        $notification->title('PHP Notification')
            ->message('It\'s work :)')
            ->show();

        return Redirect::to(route('dashboard'));
    }

    public function dialog(Request $request)
    {
        Dialog::new()
            ->title('Select a file')
            ->open();

        return Redirect::to(route('dashboard'));
    }
}

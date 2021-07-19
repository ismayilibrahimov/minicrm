<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class SendMessageListener
{

    public function __construct()
    {
        //
    }


    public function handle($event)
    {
        Mail::to($event->email)->send(new WelcomeEmail($event->name));
    }
}

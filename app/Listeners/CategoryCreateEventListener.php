<?php

namespace App\Listeners;

use App\Events\CategoryCreateEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryCreateEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CategoryCreateEvent  $event
     * @return void
     */
    public function handle(CategoryCreateEvent $event)
    {
        if(Cache::has('Categories')){
            Cache::forget('Categories');
        }
    }
}

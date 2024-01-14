<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;


class AssignRoleToUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event)
    {
        //
        DB::table('user_roles')->insert([
            'user_id' => $event->user->id,
            'role_id' => 2, // ID pre "guest" rolu
        ]);
    }
}

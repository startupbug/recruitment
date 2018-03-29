<?php
namespace App\Listeners;
use App\User;
use App\Profile;
use DB;
use App\Events\UserProfile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
class CreateProfile
{
    /**
     * Create the event listener.
     *
     * @return void
    */
    public function __construct()
    {    
    }
    /**
     * Handle the event.
     *
     * @param  UserProfile  $event
     * @return void
    */
    public function handle(UserProfile $event)
    {
        $profile = Profile::create([
            'user_id' => $event->user->id,
            'username' => $event->user->email,
        ]); 
    }
}

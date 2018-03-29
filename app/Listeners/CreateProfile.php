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
        if (!isset($event->user['request']['phone_no']) && !isset($event->user['request']['social'])) {
            $event->user['request']['phone_no'] = NULL;
            $event->user['request']['social'] = NULL;
        }
        $profile = Profile::create([
            'user_id' => $event->user['user']->id,
            'username' => $event->user['user']->email,            
            'phone' => $event->user['request']['phone_no'],
            'social' => $event->user['request']['social'],
        ]); 
    }
}

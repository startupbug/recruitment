<?php
namespace App\Listeners;
use App\User;
use App\CompanyProfile;
use DB;
use App\Events\UserCompanyProfile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateCompanyProfile
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
     * @param  CompanyProfile  $event
     * @return void
    */
    public function handle(UserCompanyProfile $event)
    {
    	
        $profile = CompanyProfile::create([
            'employee_id' => $event->user->id,           
        ]); 
    }
}

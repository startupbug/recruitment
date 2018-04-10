<?php
namespace App\Listeners;
use App\User;
use App\Test_template;
use App\Section;
use DB;
use App\Events\TemplateSection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateTemplateSection
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
    public function handle(TemplateSection $event)
    {    	
        $section = Section::create([
            'template_id' => $event->user->id,           
            'section_name' => 'Section',           
            'order_number' => '1',           
        ]); 
    }
}

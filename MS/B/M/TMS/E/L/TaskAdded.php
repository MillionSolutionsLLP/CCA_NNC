<?php

namespace B\TMS\E\L;

use B\TMS\E\TaskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskAdded
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
     * @param  TaskCreated  $event
     * @return void
     */
  

    public function addtoTaskMaste($event) {

        return $event->model->MS_all()->toArray();


         //   dd(session()->all());

    }


    public function subscribe($events)
    {
        $events->listen(
            'B\TMS\E\TaskCreated',
            'B\TMS\E\L\TaskAdded@addtoTaskMaste'
          
        );

     
    
    }
}

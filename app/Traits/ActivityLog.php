<?php
namespace App\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait ActivityLog
{
    use LogsActivity;

    public function getActivitylogOptions() : LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('System')
        ->logAll()
        ->setDescriptionForEvent(fn(string $eventName) => "The model({$this->getClassBasename()}) has been({$eventName})");
    }

    private function getClassBasename(){
        return basename(str_replace('\\', '/', get_class($this)));
    }
}

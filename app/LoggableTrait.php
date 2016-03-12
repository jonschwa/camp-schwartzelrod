<?php namespace App;

use App\AccessLog;

trait LoggableTrait
{
    public function accessLog($loggableId, $type)
    {
        $accessLog = new AccessLog();
        $accessLog->loggable_id = $loggableId;
        $accessLog->loggable_type = $type;
        $accessLog->save();
    }

}
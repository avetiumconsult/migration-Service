<?php

namespace App\Helpers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class UniqueIdHelper
{
    public static function generateUniqueId()
    {
        $dateTime = Carbon::now()->format('YmdHis');
        $randomString = Uuid::uuid4(4)->toString(); 

        return $dateTime . '-' . $randomString;
    }

    public static function zohoDateFomat($date)
    {
        return $date; 
    }
}

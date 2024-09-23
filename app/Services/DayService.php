<?php
namespace App\Services;

use App\Models\Vacation;
use App\Models\WorkDay;

class DayService
{
    /**
     * Je datum pracovnim dnem
     * @param string $date
     * @return bool
     */
    public static function isWork(string $date, string $lang = 'cz'): bool
    {
        // Pracovni dny
        $index = date('w', strtotime($date));
        $wd = WorkDay::firstWhere(['lang'=>$lang, 'day'=>$index]);
        $ret = ($wd->workday);
        
        return $ret && !self::isVacation($date, $lang);
    }
    
    /**
     * Je datum svatkem?
     * @param string $date
     * @return bool
     */
    public static function isVacation(string $date, string $lang = 'cz'): bool
    {
        $vm = Vacation::firstWhere(['lang'=>$lang, 'date' => $date]);
        $ret = !empty($vm);
        
        // Pevne
        $vs = Vacation::firstWhere(['lang'=>$lang, 'date' => date('m-d', strtotime($date))]);
        $ret |= !empty($vs);
        
        return $ret;
    }
}
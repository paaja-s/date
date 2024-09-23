<?php

namespace App\Services;

use Carbon\Carbon;

class EstimateService
{
    public function calculate(array $data): array
    {
        $workdays = $data['workdays'];
        $length = intval($data['length']);
        
        $created = Carbon::createFromFormat('Y-m-d H:i:s', $data['created'])->ceilMinute();
        $start = Carbon::createFromTimeString($data['start'])->setDateFrom($created);
        $end = Carbon::createFromTimeString($data['end'])->setDateFrom($created);
        
        $normal = $start->diffInMinutes($end);
        $available = 0;
        $finish = $start->setDateFrom($created);
        
        if ($created->lt($start)) {
            $available = $normal;
        } elseif ($start->lt($created) && $end->gt($created)) {
            $available = $created->diffInMinutes($end);
            $finish = $created;
        }
        
        do {
            if (($workdays && DayService::isWork($finish->format('Y-m-d'))) || !$workdays) {
                if ($length <= $available) {
                    $finish->addMinutes($length);
                }
                // Snizeni odhadu o dostupnou pracovni dobu
                $length -= $available;
            }
            // Dostupna doba uz je cely pracovni den
            $available = $normal;
            if($length > 0) {
                // A pracovni den zacina v:
                $finish->setTimeFrom($start);
                // Posun na dalsi den
                $finish->addDay();
            }
        } while ($length > 0);
        
        return [
            'created' => $data['created'], 
            'finish' => $finish->format('Y-m-d H:i:s')
        ];
    }
}

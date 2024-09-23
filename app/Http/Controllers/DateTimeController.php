<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DayService;

class DateTimeController extends Controller
{
    protected $dayService;
    
    public function index(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date_format:Y-m-d'],
            'lang' => ['nullable', 'in:cz']
        ]);
        $result = $this->checkDate($validated);
        
        return response()->json($result);
    }
    
    public function checkDate(array $data):array
    {
        $date = $data['date'];
        $lang = $data['lang'] ?? 'cz';
        $isWorkday = DayService::isWork($date, $lang);
        return [
            'Datetime' => $date,
            'Workday' => $isWorkday ? 'Yes' : 'No'
        ];
    }
}

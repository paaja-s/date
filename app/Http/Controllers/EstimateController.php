<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EstimateService;

class EstimateController extends Controller
{
    protected $estimateService;
    
    public function __construct(EstimateService $estimateService)
    {
        $this->estimateService = $estimateService;
    }
    
    public function index(Request $request)
    {
         $validatedData = $request->validate([
            'created' => ['required', 'date_format:Y-m-d H:i:s'],
            'length' => ['required', 'numeric', 'min:1'],
            'workdays' => ['required','integer'],
            'start' => ['required', 'date_format:H:i:s'],
            'end' => ['required', 'date_format:H:i:s']
        ]);
         
        $result = $this->estimate($validatedData);
        
        return response()->json($result);
    }
    
    public function estimate(array $data): array
    {
        return $this->estimateService->calculate($data);     
    }
}

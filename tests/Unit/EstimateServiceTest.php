<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\EstimateService;
use App\Services\DayService;
use Mockery;

class EstimateServiceTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
    
    public function test_calculate_returns_correct_finish_in_one_workday()
    {
        // Vytvoření mocku pro DayService
        $dayServiceMock = Mockery::mock(DayService::class);
        
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-24')->andReturn(true);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-25')->andReturn(true);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-26')->andReturn(true);
        
        // Vstupní data
        $data = [
            'workdays' => true,
            'length' => 240, // 4 hodiny
            'created' => '2024-09-25 08:00:00',
            'start' => '08:00:00',
            'end' => '16:00:00',
        ];
        
        // Očekávaný výstup
        $expected = [
            'created' => '2024-09-25 08:00:00',
            'finish' => '2024-09-25 12:00:00',
        ];
        
        // Inicializace třídy a volání metody calculate
        $estimateService = new EstimateService($dayServiceMock);
        $result = $estimateService->calculate($data);
        
        // Porovnání výsledků
        $this->assertEquals($expected, $result);
    }
    
    public function test_calculate_handles_overlap_workday_correctly()
    {
        // Vytvoření mocku pro DayService
        $dayServiceMock = Mockery::mock(DayService::class);
        
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-24')->andReturn(true);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-25')->andReturn(true);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-26')->andReturn(true);
        
        // Vstupní data
        $data = [
            'workdays' => true,
            'length' => 480, // 8 hodin
            'created' => '2024-09-25 12:00:00',
            'start' => '08:00:00',
            'end' => '16:00:00',
        ];
        
        // Očekávaný výstup
        $expected = [
            'created' => '2024-09-25 12:00:00',
            'finish' => '2024-09-26 12:00:00',
        ];
        
        // Inicializace třídy a volání metody calculate
        $estimateService = new EstimateService($dayServiceMock);
        $result = $estimateService->calculate($data);
        
        // Porovnání výsledků
        $this->assertEquals($expected, $result);
    }
    
    public function test_calculate_handles_overlap_weekend_correctly()
    {
        // Vytvoření mocku pro DayService
        $dayServiceMock = Mockery::mock(DayService::class);
        
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-27')->andReturn(true);
        // Weekend
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-28')->andReturn(false);
        // Weekend
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-29')->andReturn(false);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-30')->andReturn(true);
        
        // Vstupní data
        $data = [
            'workdays' => true,
            'length' => 480, // 8 hodin
            'created' => '2024-09-27 15:00:00',
            'start' => '08:00:00',
            'end' => '16:00:00',
        ];
        
        // Očekávaný výstup
        $expected = [
            'created' => '2024-09-27 15:00:00',
            'finish' => '2024-09-30 15:00:00',
        ];
        
        // Inicializace třídy a volání metody calculate
        $estimateService = new EstimateService($dayServiceMock);
        $result = $estimateService->calculate($data);
        
        // Porovnání výsledků
        $this->assertEquals($expected, $result);
    }
    
    public function test_calculate_handles_overlap_end_workday_correctly()
    {
        // Vytvoření mocku pro DayService
        $dayServiceMock = Mockery::mock(DayService::class);
        
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-24')->andReturn(true);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-25')->andReturn(true);
        // Workday
        $dayServiceMock->shouldReceive('isWork')
        ->with('2024-09-26')->andReturn(true);
        
        // Vstupní data
        $data = [
            'workdays' => true,
            'length' => 240, // 4 hodiny
            'created' => '2024-09-25 16:00:00',
            'start' => '08:00:00',
            'end' => '16:00:00',
        ];
        
        // Očekávaný výstup
        $expected = [
            'created' => '2024-09-25 16:00:00',
            'finish' => '2024-09-26 12:00:00',
        ];
        
        // Inicializace třídy a volání metody calculate
        $estimateService = new EstimateService($dayServiceMock);
        $result = $estimateService->calculate($data);
        
        // Porovnání výsledků
        $this->assertEquals($expected, $result);
    }
}

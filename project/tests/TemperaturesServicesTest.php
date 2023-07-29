<?php

class TemperaturesServicesTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown(): void {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned(){
        $service = $this->createMock(TemperatureService::class);
        $map =[
         ['12:00', 20], ['14:00', 26]
        ];

        $service
            ->expects($this->exactly(2))
            ->method('getTemperature')
            ->will($this->returnValueMap($map));
        $weather = new WeatherMonitor($service);
        $this->assertEquals(23, $weather->getAverageTemperature('12:00','14:00'));

    }
    public function testCorrectAverageIsReturnedWithMpocker(){
        $service = Mockery::mock(TemperatureService::class);
        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $service->shouldReceive('getTemperature')->once()->with('16:00')->andReturn(12);

         $weather = new WeatherMonitor($service);
         $this->assertEquals(16, $weather->getAverageTemperature('12:00','16:00'));
    }

        public function testCorrectDivIsReturnedWithMpocker(){
        $service = Mockery::mock(TemperatureService::class);
        $service->shouldReceive('div')->once()->with(10,5)->andReturn(2);
       //$service->shouldReceive('div')->once()->with(20,2)->andReturn(5);

         $weather = new WeatherMonitor($service);
         $this->assertEquals(2, $weather->div(10,5));
    }
}
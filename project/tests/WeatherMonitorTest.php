<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned()
    {
        $service = $this->createMock(TemperatureService::class);
        $service->expects($this->exactly(2))->method('getTemperature')->will($this->returnValueMap([
            ['18:00', 12],
            ['20:00', 8]
        ]));
        $weather = new WeatherMonitor($service);
        $this->assertEquals(10, $weather->getAverageTemperature('18:00', '20:00'));

    }

        public function testCorrectAverageIsReturnedWithMockery()
    {
        $service = Mockery::mock(TemperatureService::class);

        $service->shouldReceive('getFileName')
            ->once()->with("Habib","Bellaaj")
            ->andReturn("Habib-Bellaaj");


        $weather = new WeatherMonitor($service);

        $this->assertEquals("Habib-Bellaaj", $weather->getFileNameServices("Habib", "Bellaaj"));
    }
}





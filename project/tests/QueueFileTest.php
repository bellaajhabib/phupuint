<?php

use PHPUnit\Framework\TestCase;

class QueueFileTest extends TestCase
{
    protected static $queue;

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue();
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {

        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());

    }

    public function testAnItemIsRemovedToTheQueue()
    {

        static::$queue->push('yellow');

        static::$queue->pop();
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsMergedToTheQueue()
    {

        static::$queue->push('green');
        $mergedArray = static::$queue->merged(['blue']);

        $this->assertEquals(2, static::$queue->getCount());
        $this->assertEqualsCanonicalizing($mergedArray, ['green', 'blue']);
        $this->assertArrayHasKey(1, $mergedArray);
        $this->assertContains('blue', $mergedArray);
        $this->assertContainsOnly('string', $mergedArray);
        $this->assertCount(2, $mergedArray);

    }

    public function testPushMax()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
        $this->assert(Queue::MAX_ITEMS, static::$queue->getCount());

    }
    public function testExceptionPushMax()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");;



    }
    protected function setUp(): void
    {
        static::$queue->clear();
    }


}
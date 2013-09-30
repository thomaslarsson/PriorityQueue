<?php

namespace ThomasLarsson\Queue\Test;

require dirname(dirname(__FILE__)) . '../../vendor/autoload.php';

/**
 * Description of AscendingQueueTest
 *
 * @author Thomas
 */

use ThomasLarsson\PriorityQueue\MaxPriorityQueue as MaxPriorityQueue;

class MaxPriorityQueueTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->queue = new MaxPriorityQueue();
    }

    public function testAddingOne()
    {
        $expected = 1;
        $this->queue->insert("1", array(0, 0));

        $this->assertEquals($this->queue->count(), $expected);
    }

    public function testIsDescending()
    {
        $expectedResult = array("3","2","1","0");

        $this->queue->insert("0", array(4, 0));
        $this->queue->insert("1", array(3, 0));
        $this->queue->insert("2", array(2, 0));
        $this->queue->insert("3", array(1, 0));

        foreach ( $this->queue as $data )
        {
            $result[] = $data;
        }

        $this->assertEquals($expectedResult, $result);
    }

    public function testPrecision()
    {
        $expectedResult = array("3","2","1","0");

        // Insert data
        $this->queue->insert("3", 0);
        $this->queue->insert("2", 1);
        $this->queue->insert("1", 2);
        $this->queue->insert("0", 3);

        // Build result list
        foreach ( $this->queue as $data )
        {
            $result[] = $data;
        }

        $this->assertEquals($expectedResult, $result);
    }

        public function testIdentical()
    {
        $expectedResult = array("1","0");

        $this->queue->insert("1", 0);
        $this->queue->insert("0", 0);

        foreach ( $this->queue as $data )
        {
            $result[] = $data;
        }

        $this->assertEquals($expectedResult, $result);
    }

}

?>
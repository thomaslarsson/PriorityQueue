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
        $expectedResult = array(4, 3, 2, 1, 0);

        $this->queue->insert(0, 0);
        $this->queue->insert(1, 0);
        $this->queue->insert(2, 0);
        $this->queue->insert(3, 0);
        $this->queue->insert(4, 0);

        foreach ( $this->queue as $value )
        {
            $result[] = $value;
        }

        $this->assertEquals($expectedResult, $result);
    }

    public function testAlphaNumericalValues()
    {
        $expectedResult = array("e", "d", "c", "b", "a");

        $this->queue->insert("a", 0);
        $this->queue->insert("b", 0);
        $this->queue->insert("c", 0);
        $this->queue->insert("d", 0);
        $this->queue->insert("e", 0);

        foreach ( $this->queue as $value )
        {
            $result[] = $value;
        }

        $this->assertEquals($expectedResult, $result);
    }

    public function testLargeAmountsOfRandomData()
    {
        // Notice the array is sorted further down
        $reverseSortedRandomIntegers = array(-9713,-9708,-9689,-9550,-9100,-8887,-8803,-8395,-8322,-8244,-8023,-7916,-7844,-7728,-7723,-7625,-7212,-7070,-6784,-6624,-6476,-6460,-6308,-5880,-5277,-5226,-5191,-5149,-5039,-4859,-4131,-3699,-3623,-3612,-2953,-2756,-2711,-2410,-1237,-1077,-825,-471,-363,-321,-28,40,88,236,298,458,917,1205,1623,1682,1869,1916,2311,2373,2581,2897,3169,3250,3849,4288,4369,4374,4674,4917,5060,5153,5339,5683,5705,5751,5774,5937,5987,6023,6892,6952,7024,7298,7500,7622,7684,7718,7848,8094,8195,8295,8332,8342,8544,8619,8753,8883,9240,9820,9830,9898);

        // Add integers to the queue
        foreach ( $reverseSortedRandomIntegers as $key => $int )
        {
            $this->queue->insert($int, $key);
        }

        // Add the data to a result array
        foreach ( $this->queue as $int )
        {
            $sortedData[] = $int;
        }

        // Sort the array
        sort($reverseSortedRandomIntegers);

        // Check data
        $this->assertEquals($reverseSortedRandomIntegers, $sortedData);
    }

}

?>
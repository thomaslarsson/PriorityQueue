<?php namespace ThomasLarsson\Queue\Test;

// Require Composer autoloader
require dirname(__DIR__) . '../../vendor/autoload.php';

/**
 * Description of AscendingQueueTest
 *
 * @author Thomas Maurstad Larsson <thomas.m.larsson@gmail.com>
 * @version 1.0
 *
 * @license http://URL MIT-license
 */

// Declare needed namespaces
use ThomasLarsson\PriorityQueue\MinPriorityQueue as MinPriorityQueue;

class MinPriorityQueueTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->queue = new MinPriorityQueue();
    }

    /**
     * Make sure adding elements is reflected in the count
     */
    
    public function testThatCountIsAffectedByInserts()
    {
        $expectedCount = 1;
        $this->queue->insert("1", array(0, 0));

        $this->assertEquals($expectedCount, $this->queue->count());
    }
    
    /**
     * Check that the MinPriorityQueue sorts nodes in ascending order. (Low to high)
     * 
     * This is the expected behavior for a min heap implementation.
     */
    
    public function testThatTheQueueSortsDescending()
    {
        $expectedResult = array("0","1","2","3");

        $this->queue->insert("3", 0);
        $this->queue->insert("2", 1);
        $this->queue->insert("1", 2);
        $this->queue->insert("0", 3);

        foreach ( $this->queue as $data )
        {
            $result[] = $data;
        }

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Expect nodes to keep the insert order when nodes are inserted with
     * equal priority.
     */
    
    public function testThatInsertOrderIsKeptOnEqualPriorityInserts()
    {
        $expectedResult = array(0, 1, 2, 3, 4);

        $this->queue->insert(4, 0);
        $this->queue->insert(3, 0);
        $this->queue->insert(2, 0);
        $this->queue->insert(1, 0);
        $this->queue->insert(0, 0);

        foreach ( $this->queue as $value )
        {
            $result[] = $value;
        }

        $this->assertEquals($expectedResult, $result);
    }
    
    /**
     * Make sure that alphanumerical values are sorted correctly
     */
    
    public function testThatAlphaNumericalInputIsSortedAsExpected()
    {
        $expectedResult = array("a", "b", "c", "d", "e");

        $this->queue->insert("e", 0);
        $this->queue->insert("d", 0);
        $this->queue->insert("c", 0);
        $this->queue->insert("b", 0);
        $this->queue->insert("a", 0);

        foreach ( $this->queue as $value )
        {
            $result[] = $value;
        }

        $this->assertEquals($expectedResult, $result);
    }

    public function testLargeAmountsOfRandomData()
    {
        // Notice the array is sorted further down
        $reverseSortedRandomIntegers = array(9987,9842,9759,9692,9452,9447,9305,9150,9014,8977,8940,8855,8825,8717,8643,8061,7922,7842,7760,7719,7679,7677,7639,7249,6675,6612,6520,6418,6178,6029,5985,5671,5663,5290,5251,5080,4822,4541,4231,4002,3895,3555,3312,2522,2071,1761,1705,1504,1481,883,784,410,406,112,-73,-455,-467,-608,-886,-1047,-1259,-1302,-1320,-1357,-1498,-2293,-2541,-2681,-3046,-3170,-3789,-4004,-4449,-4936,-5314,-5424,-5473,-6039,-6285,-6566,-6678,-6776,-6797,-6801,-7256,-7541,-7545,-7549,-7962,-8034,-8123,-8148,-8178,-8289,-9017,-9043,-9463,-9853,-9933,-9978);

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
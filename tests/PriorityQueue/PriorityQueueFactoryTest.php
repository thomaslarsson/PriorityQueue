<?php

namespace ThomasLarsson\Queue\Test;

require dirname(dirname(__FILE__)) . '../../vendor/autoload.php';

/**
 * Description of AscendingQueueTest
 *
 * @author Thomas
 */

use ThomasLarsson\PriorityQueue\PriorityQueueFactory as PriorityQueueFactory;

class PriorityQueueFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->ascending = PriorityQueueFactory::create(PriorityQueueFactory::QUEUE_ASC);
        $this->descending = PriorityQueueFactory::create(PriorityQueueFactory::QUEUE_DESC);
    }

    public function testSetUpAscending()
    {
        $expectedType = 'ThomasLarsson\PriorityQueue\MinPriorityQueue';
        $this->assertInstanceof($expectedType, $this->ascending);
    }

    public function testSetUpDescending()
    {
        $expectedType = 'ThomasLarsson\PriorityQueue\MaxPriorityQueue';
        $this->assertInstanceof($expectedType, $this->descending);
    }


}

?>

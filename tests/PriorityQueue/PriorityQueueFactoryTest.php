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

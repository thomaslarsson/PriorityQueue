<?php

namespace ThomasLarsson\PriorityQueue;

/**
 * Returns PriorityQueues sorted in order specified
 *
 * Order maintained for nodes with equal priority on dequeue
 * 
 * @author Thomas
 */

use ThomasLarsson\PriorityQueue\MinPriorityQueue as MinPriorityQueue;
use ThomasLarsson\PriorityQueue\MaxPriorityQueue as MaxPriorityQueue;

class PriorityQueueFactory
{
    const QUEUE_ASC = 'asc';
    const QUEUE_DESC = 'desc';

    /**
     * Creates a PriorityQueue sorted in the order specified
     * 
     * PriorityQueueFactory::QUEUE_ASC      Ascending PriorityQueue
     * PriorityQueueFactory::QUEUE_DESC     Descending PriorityQueue
     * 
     * @param String $order         The sort order
     * @return \ThomasLarsson\Queue\AscendingPriorityQueue|\ThomasLarsson\Queue\DescendingPriorityQueue     A PriorityQueue
     */
    
    public static function create( $order = '' )
    {
        switch ( $order )
        {
            case "asc" :
                return new MinPriorityQueue();
                break;
            case "desc" :
                return new MaxPriorityQueue();
                break;
            default :
                return new MinPriorityQueue();
        }
    }

}

?>

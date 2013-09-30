<?php

namespace ThomasLarsson\PriorityQueue;

/**
 * MaxPriorityQueue is a Priority Queue built on a max heap,
 * i.e sorted in descending order. (High to low)
 *
 * Order maintained for nodes with equal priority on dequeue
 *
 * @see AscendingPriorityQueue for an ascendig queueue
 *
 * @author Thomas Maurstad Larsson <thomas.m.larsson@gmail.com>
 * @version 1.0
 *
 * @license http://URL MIT-license
 */

class MaxPriorityQueue extends PriorityQueue
{

    /**
     * Insert a node in the Queue
     * 
     * @param type $value
     * @param type $priority
     */
    
    public function insert($value, $priority) 
    {
        parent::insert($value, $priority);
        $this->increasePriority();
    }
    
    /**
     * Sorts the nodes decending
     *
     * @param array $timeAt         The time placed
     * @param array $other          The time the other is place
     *
     * @return int
     */

    public function compare( $timeAt, $other)
    {
        if ($timeAt === $other) return 0;
        return $timeAt < $other ? 1 : -1;
    }
}

?>

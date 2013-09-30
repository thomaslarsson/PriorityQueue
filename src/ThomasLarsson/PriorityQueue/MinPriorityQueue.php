<?php

namespace ThomasLarsson\PriorityQueue;

/**
 * MinPriorityQueue is a Priority Queue built on a min heap,
 * i.e sorted in ascending order. (Low to hight)
 *
 * Order maintained for nodes with equal priority on dequeue
 *
 * @see DescendingPriorityQueue for a descending order priority queue.
 *
 * @author Thomas Maurstad Larsson <thomas.m.larsson@gmail.com>
 * @version 1.0
 *
 * @license http://URL MIT-license
 */

class MinPriorityQueue extends PriorityQueue
{

    public function insert($value, $priority) 
    {
        parent::insert($value, $priority);
        $this->decreasePriority();
    }
    
    /**
     * Sorts the nodes ascending.
     *
     * Note: The method is called by default when
     *
     * @param array $timeAt         The time placed
     * @param array $other          The time the other is place
     *
     * @return int
     */

    public function compare( $timeAt, $other)
    {
        if ($timeAt === $other) return 0;
        return $timeAt < $other ? -1 : 1;
    }
}

?>

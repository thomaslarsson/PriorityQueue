<?php namespace ThomasLarsson\PriorityQueue;

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

class MaxPriorityQueue extends \SplPriorityQueue
{
    /** @var int        The priority used internally by nodes */
    protected $internalTimePriority;

    /**
     * public constructor
     */

    public function __construct()
    {
        $this->internalTimePriority = 0;
    }

    /**
     * Insert a node in the Queue
     *
     * @param AnyType $value        The value to insert
     * @param int $priority         The priority
     */

    public function insert($value, $priority)
    {
        parent::insert($value, array((int)$priority, $this->internalTimePriority--));
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
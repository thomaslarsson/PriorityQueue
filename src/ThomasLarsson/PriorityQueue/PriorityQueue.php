<?php

namespace ThomasLarsson\PriorityQueue;

/**
 * PriorityQueue is an abstract Priority Queue
 *
 * Order maintained for nodes with equal priority on dequeue
 * 
 * @see MinPriorityQueue for an ascendig queueue
 * @see MaxPriorityQueue for a descending order priority queue.
 *
 * @author Thomas Maurstad Larsson <thomas.m.larsson@gmail.com>
 * @version 1.0
 *
 * @license http://URL MIT-license
 */

abstract class PriorityQueue extends \SplPriorityQueue 
{
    /** @var int        The priority used internally by nodes */
    private $internalTimePriority;
    
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
        parent::insert($value, array($priority, $this->internalTimePriority--));
    }
    
    /**
     * Increases the internal priority of a node
     * 
     * Implementations using a min healp should call this on insert
     */
    
    protected function increasePriority()
    {
        $this->internalTimePriority++;
    }
    
    /**
     * Decreases the internal priority
     * 
     * Implementations using a max healp should call this on insert
     */
    
    protected function decreasePriority()
    {
        $this->internalTimePriority++;
    }
    

}

?>

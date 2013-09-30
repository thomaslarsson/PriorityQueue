PriorityQueue
=============

Ascending/descending PriorityQueues. Order maintained for nodes with equal priority on dequeue.

#### Install


### Fixes equal priority sorting bug
ThomasLarsson/PriorityQueue is built on top of [SplPriorityQueue](http://www.php.net/manual/en/class.splpriorityqueue.php).
This implementation fixes problems when two or more nodes share a similar priority. The standard
SPL-implementation will dequeue equal priority nodes in no particular (random)
order, as noted in the manual.

> ##### SPLPriorityQueue::compare()
>
> **Note:**
> Multiple elements with the same priority will get dequeued in no
> particular order.
PriorityQueue [![Build Status](https://travis-ci.org/thomaslarsson/Football.png?branch=master)](https://travis-ci.org/thomaslarsson/Football)
=============

Ascending/descending PriorityQueues. Order maintained for nodes with equal priority on dequeue.

#### Install
You can install the package using Composer.

1. Install composer.
2. Add the following dependency to a composer.json and:

```
{
    "require": {
        "thomaslarsson/priorityqueue": "1.0.*"
    }
}
```

The package is now installed in your vendor directory.

#### Usage
```
// Require composer's autoload
require 'vendor/autoload.php';

// Optional: Alias/import the package's namespace
use ThomasLarsson\PriorityQueue\MinPriorityQueue as MinPriorityQueue,
    ThomasLarsson\PriorityQueue\MaxPriorityQueue as MaxPriorityQueue;

// Create a ascending queue (Use the package's namespace unless you aliased it)
$ascendingQueue = new MinPriorityQueue();

// ... OR a descending queue.
$descendingQueue = new MaxPriorityQueue(); // A decending queue

// Create some data sorted descending (Just to illustrate that it's working)
$ascendingQueue->insert(4, 0);
$ascendingQueue->insert(3, 0);
$ascendingQueue->insert(2, 0);
$ascendingQueue->insert(1, 0);
$ascendingQueue->insert(0, 0);

// Display the sorted result
foreach ( $ascendingQueue as $value )
{
    echo $value . "\n";
}
```

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
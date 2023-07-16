Redis is an open-source, in-memory data structure store, used as a database, cache, and message broker. It supports various data structures such as strings, hashes, lists, sets, sorted sets with range queries, bitmaps, hyperlogs, and geospatial indexes with radius queries.

The primary advantage of Redis is that it stores data in memory, which provides extremely fast read and write operations.

Here is a basic example of using Redis with PHP, using the predis/predis package, which is a flexible and feature-complete Redis client library for PHP. 

First, you need to install the predis library using composer:

```bash
composer require predis/predis
```

Then, you can use the following code to connect to a Redis instance, set some key-value pairs, retrieve them, and delete a key:

```php
<?php
require 'vendor/autoload.php';

// Connect to Redis
$client = new Predis\Client();

// Set a key
$client->set('foo', 'bar');

// Get the value of a key
$value = $client->get('foo');
echo "foo = $value\n";  // Outputs: foo = bar

// Set multiple keys
$client->mset([
    'foo' => 'bar',
    'hello' => 'world',
]);

// Get the values of multiple keys
$values = $client->mget(['foo', 'hello']);
print_r($values);  // Outputs: Array ( [0] => bar [1] => world )

// Delete a key
$client->del('foo');

// Try to get the value of the deleted key
$value = $client->get('foo');
echo "foo = $value\n";  // Outputs: foo = 
?>
```

To run this code, you need to have a Redis server running. If you are using a local development environment, you can install Redis locally. If you are deploying your code, you might use a Redis service provided by your hosting platform or a dedicated Redis hosting service.

It's worth noting that Redis is much more than a simple key-value store - it has powerful features for handling lists, sets, sorted sets, and more. Additionally, it supports transactions, publish/subscribe messaging, and has robust persistence and replication features.
Redis is an open-source, in-memory data structure store that can be used as a database, cache, and message broker. It supports a wide range of data structures like strings, hashes, lists, sets, sorted sets, etc. 

One of the key aspects of Redis is its persistence capabilities. Redis allows you to persist your data by writing it to the disk in two ways:

1. **RDB (Redis Database Backup)**: This persistence method performs point-in-time snapshots of your dataset at specified intervals. RDB is a compact, faster option suited for backups and faster reboots.

2. **AOF (Append Only File)**: This method logs every write operation received by the server. The log can be replayed to rebuild the state of the data. It is more robust, as the log can be synced with the disk more frequently, reducing the chance of data loss.

Here is an example of how to use Redis for persistence in PHP:

First, install the Redis PHP extension via PECL:

```
pecl install redis
```

Make sure to enable the extension in your `php.ini` file by adding `extension=redis.so`.

Here is a simple PHP code to connect to Redis and perform some operations:

```php
<?php
$redis = new Redis();

// Connecting to Redis server on localhost
$redis->connect('127.0.0.1', 6379);
echo "Connected to server successfully.\n";

// Storing a string in Redis
$redis->set("test_key", "Hello, World!");
echo "Stored string in Redis.\n";

// Getting the value of the stored string
$value = $redis->get("test_key");
echo "Retrieved value from Redis: $value\n";
?>
```

Assuming that you have Redis running locally, this will connect to Redis, store a string, and then retrieve it. The data will persist based on the persistence configuration in your Redis server. 

You can configure the persistence options in the `redis.conf` file. For instance, to enable RDB persistence, you can uncomment and set the `save` directives like so:

```
save 900 1
save 300 10
save 60 10000
```

These settings mean that Redis will save the dataset every 900 seconds if at least 1 key changed, every 300 seconds if at least 10 keys changed, and every 60 seconds if at least 10000 keys changed.

For AOF, you can uncomment and set the `appendonly` directive:

```
appendonly yes
```

Remember that using AOF could potentially have more impact on performance compared to RDB, especially when disk I/O operations are expensive, but it provides a higher level of durability. 

Most often, a combination of RDB and AOF is used in real-world applications to balance between data safety and speed. The configuration could be set according to the requirement of each specific use case.

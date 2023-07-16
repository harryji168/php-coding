Redis transactions allow you to execute a group of commands in a single step. With Redis transactions, you can ensure a sequence of commands is executed as a single isolated operation. In Redis, a transaction is initiated using the `MULTI` command, then you can run a series of commands, and finally, use the `EXEC` command to execute all the commands at once.

In PHP, you can use the phpredis extension to interact with a Redis instance. Here's an example of a Redis transaction using phpredis:

```php
<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// start transaction
$redis->multi();

// perform operations
$redis->set('book:1:name', 'A Game of Thrones');
$redis->set('book:1:author', 'George R. R. Martin');

// execute transaction
$redis->exec();
?>
```

In this example, the `multi()` method is used to initiate a transaction. The `set()` methods are used to perform operations (in this case, setting key-value pairs). Finally, the `exec()` method is used to execute the transaction. If the transaction is successful, all changes will be saved to the Redis instance. If the transaction fails for some reason, none of the changes will be saved.

It's worth noting that Redis transactions are not "atomic" in the sense used in many relational databases: other clients can issue commands and see intermediate states between the `MULTI` and `EXEC` commands. If you need to ensure that no other clients can run commands concurrently with your transaction, you can use the `WATCH` command to abort the transaction if the watched keys are modified.
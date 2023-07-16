Redis provides Publish/Subscribe (pub/sub) messaging patterns where senders (publishers) send messages to specific channels, without knowing who the receivers (subscribers) are. Subscribers, on the other hand, can listen to these channels and receive messages as they come in. 

To interact with Redis from PHP, you can use the Predis library. 

Here's an example of how to use Redis pub/sub with PHP:

Firstly, make sure you have predis installed via composer:

```
composer require predis/predis
```

Now, we will create two scripts: one for publishing messages and one for subscribing.

**Publisher (publish.php):**

```php
<?php
require 'vendor/autoload.php';

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1', // Change this to your Redis server IP / hostname
    'port'   => 6379, // Change this to your Redis server port
]);

$channel = 'channel-name';

// This loop emulates something generating events to be published
while (true) {
    $message = 'Message ' . date('Y-m-d H:i:s');
    
    $client->publish($channel, $message);
    echo "Published: $message\n";
    
    sleep(1); // Sleep for 1 second
}
?>
```

**Subscriber (subscribe.php):**

```php
<?php
require 'vendor/autoload.php';

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1', // Change this to your Redis server IP / hostname
    'port'   => 6379, // Change this to your Redis server port
]);

$channel = 'channel-name';

$client->pubSubLoop([$channel], function ($message) {
    if ($message->kind === 'message') {
        echo "Received: $message->payload\n";
    }
});
?>
```

To test these scripts, run the subscriber script in one terminal window, and the publisher script in another. You should see the publisher sending a message every second, and the subscriber receiving these messages.
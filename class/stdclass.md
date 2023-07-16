`stdClass` is a generic empty class provided by PHP. It's often used to create new objects on the fly. Here's how you could use it:

```php
$object = new stdClass;
$object->property1 = "Property1";
$object->property2 = "Property2";
$object->property3 = "Property3";

echo $object->property1; // Outputs: Property1
echo $object->property2; // Outputs: Property2
echo $object->property3; // Outputs: Property3
```

As you can see, you can add properties to an `stdClass` object simply by assigning values to them with the `->` operator.

It's worth noting that when you use `json_decode()` to decode a JSON object to a PHP object without specifying an associative array as the second parameter, you'll get an `stdClass` object:

```php
$json = '{"property1":"Property1", "property2":"Property2", "property3":"Property3"}';

$object = json_decode($json);

echo get_class($object); // Outputs: stdClass
echo $object->property1; // Outputs: Property1
```

This demonstrates how `stdClass` objects are often used as simple data containers. However, they do not have any methods, so if you need more complex behavior, you'll likely want to define your own class.
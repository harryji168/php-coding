MongoDB is a NoSQL database which is designed to deal with large amounts of data that's diverse in type -- structured, semi-structured and unstructured data. MongoDB stores data as documents in a binary representation called BSON (Binary JSON). Documents contain one or more fields, including arrays, binary data and sub-documents.

Features of MongoDB:

- **Schemaless**: MongoDB is a document database in which one collection holds different documents. The structure (i.e., fields) of documents in a collection can differ from each other.
- **NoSQL**: MongoDB is a NoSQL database, so it doesn't require a fixed schema and is easy to scale.
- **Performance**: MongoDB can handle large volumes of data and can spread database loads across multiple systems for high availability and data redundancy.
- **Replication**: MongoDB can provide high availability with replica sets, which are somewhat equivalent to master-slave replication in relational databases.
- **Indexing**: You can index any field in a MongoDB document, which helps improve search performance.

Below is a simple example in PHP using the MongoDB driver:

```php
<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Connect to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select a database
$db = $client->test;

// Select a collection
$collection = $db->users;

// Insert a document
$insertResult = $collection->insertOne([
    'username' => 'johndoe',
    'email' => 'johndoe@example.com',
    'name' => 'John Doe'
]);

printf("Inserted %d document(s)\n", $insertResult->getInsertedCount());

// Find a document
$user = $collection->findOne(['username' => 'johndoe']);

var_dump($user);
?>
```
Before running this code, make sure you've installed MongoDB and the MongoDB driver for PHP and that the MongoDB service is running.

This simple script first connects to a MongoDB server, selects the "test" database, and the "users" collection. It then inserts a new document into the collection, and finally retrieves and dumps that document based on the 'username' field.
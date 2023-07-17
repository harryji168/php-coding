It will involve working with the Moodle API. Please note that actual Moodle development is more complex and requires an understanding of Moodle's plugin architecture and database layer.

**Question:**

You're tasked with writing a function in PHP that retrieves a user's first name and last name from their Moodle profile given their user id. 

Here's what your function should do:

- Accept a user id as an input.
- Use the Moodle API to get the user's profile.
- Return an associative array with keys 'firstName' and 'lastName', and the respective data as their values.

Note: Assume that you have Moodle's global `$DB` object available to interface with Moodle's database.

**Answer:**

Here's a simple example of how this function might look:

```php
function getUserFullName($userid) {
    global $DB;

    // Ensure user id is an integer
    $userid = (int)$userid;

    // Get the user record
    $user = $DB->get_record('user', array('id' => $userid), 'firstname, lastname');

    if ($user) {
        return array(
            'firstName' => $user->firstname,
            'lastName' => $user->lastname,
        );
    } else {
        throw new Exception('User not found');
    }
}
```

This function takes a user id as an input, retrieves the corresponding user's profile using Moodle's `$DB->get_record()` function, and then returns an array with the user's first and last name. If the user is not found, it throws an exception.

It's worth noting that, in a real-world Moodle development scenario, you'd likely want to include more robust error handling and security measures. Also, if the function is supposed to be part of a Moodle plugin, it would probably be a static method inside a class.
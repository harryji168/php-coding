
**Question:**

Implement a PHP function named `reverseString($str)`, which will take a string as input and return the reverse of that string. The function should not use PHP's built-in `strrev()` function.

Here is the function's signature: `function reverseString(string $str): string`

**Answer:**

```php
function reverseString(string $str): string {
    $reversed = '';
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    return $reversed;
}
```

This function uses a for loop to iterate over the string from the end to the beginning, building up the reversed string one character at a time. The result is returned as the output of the function.

To test the function, one could use this simple test case:

```php
echo reverseString("Hello, world!"); // Outputs: "!dlrow ,olleH"
```

This example is quite basic. Depending on the level of the students or the complexity of the task you want to provide, you may need to adjust the difficulty. Keep in mind that Moodle has a variety of plugins that can help with managing coding tests and automatic grading.
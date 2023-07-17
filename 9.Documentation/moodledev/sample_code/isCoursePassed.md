Question:

Write a PHP function `isCoursePassed` which takes an array of grades as an argument, and returns a boolean value. The function should return `true` if the average grade is equal to or above 70, and `false` if it is below 70. 

Sample Solution:

```php
function isCoursePassed($grades) {
    $totalGrade = 0;
    $numberOfGrades = count($grades);

    foreach ($grades as $grade) {
        $totalGrade += $grade;
    }

    $averageGrade = $totalGrade / $numberOfGrades;

    return $averageGrade >= 70;
}
```

To test this function, you can use the following test cases:

```php
$grades = array(70, 80, 90, 100);
$result = isCoursePassed($grades);
echo $result ? 'Passed' : 'Failed';  // Output: Passed

$grades = array(60, 65, 70, 75);
$result = isCoursePassed($grades);
echo $result ? 'Passed' : 'Failed';  // Output: Passed

$grades = array(50, 60, 70);
$result = isCoursePassed($grades);
echo $result ? 'Passed' : 'Failed';  // Output: Failed
```

In a real-world Moodle PHP programming task, you might be working with Moodle's database API to pull grades from the database, or use Moodle's APIs and objects to manipulate course and user data. The example above is a simplified one and doesn't interact with Moodle's API or database.

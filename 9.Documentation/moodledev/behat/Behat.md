Behat is a behavior-driven development (BDD) framework for PHP. It is designed to help you write software that matters through continuous communication, deliberate discovery, and test automation. It provides a way to write human-readable stories that describe the behavior of your application.

Here is a basic example of using Behat to define a scenario for a web application that is intended to manage a to-do list. In this example, the feature file describes the scenario where a user adds a task to a to-do list.

```gherkin
Feature: To-do List
  In order to avoid forgetting things
  As a busy person
  I need to be able to manage a to-do list

  Scenario: Adding a task
    Given I have an empty to-do list
    When I add the task "Buy milk"
    Then I should have 1 task in my to-do list
```

Each step in the scenario corresponds to a method in a PHP class called a context. The context for the above scenario might look something like this:

```php
use Behat\Behat\Context\Context;

class ToDoListContext implements Context
{
    private $toDoList;

    /**
     * @Given I have an empty to-do list
     */
    public function iHaveAnEmptyToDoList()
    {
        $this->toDoList = [];
    }

    /**
     * @When I add the task :task
     */
    public function iAddTheTask($task)
    {
        $this->toDoList[] = $task;
    }

    /**
     * @Then I should have :count task in my to-do list
     */
    public function iShouldHaveTaskInMyToDoList($count)
    {
        PHPUnit_Framework_Assert::assertCount(
            intval($count),
            $this->toDoList
        );
    }
}
```

Note that Behat uses regular expressions to match the methods in the context to the steps in the scenario. Also, in this example, we are using PHPUnit's assertion methods to check that the outcomes are as expected.

Please note that you will need to install Behat and its dependencies before running these tests. The installation process typically involves using Composer, PHP's dependency manager. You'll also need to configure Behat for your project by creating a `behat.yml` file in the root directory of your project.

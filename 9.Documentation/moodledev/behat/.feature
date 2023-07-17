Feature: Echo
  Scenario: Echo a string
    Given I have a string "Hello, Behat!"
    When I echo the string
    Then I should get "Hello, Behat!"

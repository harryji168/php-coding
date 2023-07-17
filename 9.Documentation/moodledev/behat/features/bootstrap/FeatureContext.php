<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

class FeatureContext implements Context
{
    private $string;
    private $result;

    /**
     * @Given I have a string :string
     */
    public function iHaveAString($string)
    {
        $this->string = $string;
    }

    /**
     * @When I echo the string
     */
    public function iEchoTheString()
    {
        $this->result = $this->string;
    }

    /**
     * @Then I should get :string
     */
    public function iShouldGet($string)
    {
        if ((string) $this->result !== $string) {
            throw new Exception(
                sprintf("Expected '%s', but got '%s'", $string, $this->result)
            );
        }
    }
}

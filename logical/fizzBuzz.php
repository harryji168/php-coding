<?php

function fizzBuzz($n) {
    for($i = 1; $i <= $n; $i++) {
        $result = '';

        if ($i % 3 == 0) {
            $result .= 'Fizz';
        }

        if ($i % 5 == 0) {
            $result .= 'Buzz';
        }

        if ($result == '') {
            $result = $i;
        }

        echo $result . "\n";
    }
}

fizzBuzz(15);

?>

<?php

/**
 * @param mixed $strArr
 * 
 * @return [type]
 */
function SearchingChallenge($strArr) {
    $rows = count($strArr);
    $cols = strlen($strArr[0]);
    $matrix = [];
    $memo = [];
    
    for ($i = 0; $i < $rows; $i++) {
        $matrix[$i] = str_split($strArr[$i]);
        for ($j = 0; $j < $cols; $j++) {
            $memo[$i][$j] = 0;
        }
    }

    $result = 0;

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $result = max($result, dfs($i, $j, $matrix, $memo));
        }
    }

    return $result - 1;
}

function dfs($i, $j, $matrix, &$memo) {
    if ($memo[$i][$j] != 0) {
        return $memo[$i][$j];
    }

    $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];
    $max = 1;

    foreach ($directions as $dir) {
        $x = $i + $dir[0];
        $y = $j + $dir[1];

        if ($x < 0 || $y < 0 || $x >= count($matrix) || $y >= count($matrix[0]) || $matrix[$x][$y] <= $matrix[$i][$j]) {
            continue;
        }

        $len = 1 + dfs($x, $y, $matrix, $memo);
        $max = max($max, $len);
    }

    $memo[$i][$j] = $max;
    return $max;
}

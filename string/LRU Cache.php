<!-- Have the function LRUCache(strArr) take the array of characters stored in strArr, which will contain characters ranging from A to Z in some arbitrary order, and determine what elements still remain in a virtual cache that can hold up to 5 elements with an LRU cache algorithm implemented. For example: if strArr is ["A", "B", "C", "D", "A", "E", "D", "Z"], then the following steps are taken:

(1) A does not exist in the cache, so access it and store it in the cache.
(2) B does not exist in the cache, so access it and store it in the cache as well. So far the cache contains: ["A", "B"].
(3) Same goes for C, so the cache is now: ["A", "B", "C"].
(4) Same goes for D, so the cache is now: ["A", "B", "C", "D"].
(5) Now A is accessed again, but it exists in the cache already so it is brought to the front: ["B", "C", "D", "A"].
(6) E does not exist in the cache, so access it and store it in the cache: ["B", "C", "D", "A", "E"].
(7) D is accessed again so it is brought to the front: ["B", "C", "A", "E", "D"].
(8) Z does not exist in the cache so add it to the front and remove the least recently used element: ["C", "A", "E", "D", "Z"].

Now the caching steps have been completed and your program should return the order of the cache with the elements joined into a string, separated by a hyphen. Therefore, for the example above your program should return C-A-E-D-Z. -->



<?php 

/**
 * [Description Node]
 */
class Node {
    public $value;
    public $prev;
    public $next;

    function __construct($value) {
        $this->value = $value;
    }
}

/**
 * @param mixed $strArr
 * 
 * @return [type]
 */
function ArrayChallenge($strArr) {
    $cache = [];
    $head = new Node(null); // sentinel node
    $tail = new Node(null); // sentinel node
    $head->next = $tail;
    $tail->prev = $head;

    foreach ($strArr as $char) {
        if (isset($cache[$char])) {
            // move the character to the front of the cache
            $node = $cache[$char];
            $node->prev->next = $node->next;
            $node->next->prev = $node->prev;
        } else {
            // add the character to the cache
            $node = new Node($char);
            $cache[$char] = $node;

            // remove the least recently used character if necessary
            if (count($cache) > 5) {
                $lru = $head->next;
                unset($cache[$lru->value]);
                $lru->next->prev = $head;
                $head->next = $lru->next;
            }
        }

        // move the node to the back
        $node->prev = $tail->prev;
        $node->next = $tail;
        $tail->prev->next = $node;
        $tail->prev = $node;
    }

    // generate the output string
    $str = "";
    $node = $tail->prev;
    while ($node !== $head) {
        $str = $node->value . '-' . $str;
        $node = $node->prev;
    }

    // remove the last hyphen
    $str = substr($str, 0, -1);

    // concatenate ChallengeToken
    $token = "y4lh8xpa51";
    $str .= $token;

    // replace every fourth character with an underscore
    for ($i = 3; $i < strlen($str); $i += 4) {
        $str[$i] = '_';
    }

    return $str;
}

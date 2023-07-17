https://moodledev.io/general/development/policies/codingstyle

Moodle, an open-source learning management system, has specific coding style guidelines that contributors need to follow. they mainly follow the "Pear" coding style for PHP, which is an adaptation of PSR-12 with some differences.

Here are some highlights:

1. **File Format:** Files should be encoded in UTF-8 without BOM. PHP files should end with ".php" and must not contain any non-PHP code after the closing PHP tag, which should also be omitted.

2. **Indentation:** Use spaces for indenting, not tabs. The indent size should be 4 spaces.

3. **Line Length:** Try to limit the line length to 132 characters. This is a soft limit and not strictly enforced.

4. **Variable Names:** Variable names should be all lowercase and words separated by underscores. They should be descriptive, except for iterators, which can be called $i, $j, etc.

5. **Class Names:** Class names should be capitalized words without underscores (also known as "StudlyCaps" or "PascalCase").

6. **Function Names:** Function names should be all lowercase and words separated by underscores.

7. **Control Structures:** These include if, for, while, switch, etc. There should be one space after the control keyword, and opening braces should be on the same line as the control keyword.

8. **Comments:** Comments are encouraged and should be in PHPDoc format, especially for functions and classes.

9. **Operators:** Most binary operators should be separated from the operands by spaces.

10. **Concatenation Operator:** The dot (.) should have space on both sides.

11. **PHP Tags:** Always use full PHP tags (<?php ?>), not the shorthand (<? ?>).

 keep in mind that the Moodle code checker plugin is a tool that can help you to follow these coding style guidelines.

 https://moodle.org/plugins/local_codechecker

 https://github.com/moodlehq/moodle-local_codechecker
 
 https://github.com/moodlehq/moodle-cs
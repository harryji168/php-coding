Moodle-related programming question, followed by a solution. Note that Moodle is a free and open-source learning management system written in PHP.

Test Question:

Consider you are developing a plugin for Moodle. You need to add a new table to the database to store some additional data related to a course. Create a PHP function to add a new table named mdl_custom_table with the following fields:

*id: an auto-increment integer serving as the primary key
*course_id: an integer to store the course id
*additional_data: a text field to store the additional data

This function should use Moodle's Database API for interacting with the database.

Test Answer:

```php
function create_custom_table() {
    global $DB;

    $dbman = $DB->get_manager();

    $table = new xmldb_table('mdl_custom_table');

    // Adding fields to table mdl_custom_table.
    $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    $table->add_field('course_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
    $table->add_field('additional_data', XMLDB_TYPE_TEXT, null, null, null, null, null);

    // Adding keys to table mdl_custom_table.
    $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

    // Conditionally launch create table for mdl_custom_table.
    if (!$dbman->table_exists($table)) {
        $dbman->create_table($table);
    }
}
```
This function creates a new table mdl_custom_table with three fields id, course_id, and additional_data. It first checks whether the table already exists in the database. If not, it creates the new table.

Please note that this example assumes the caller of the function has necessary permissions to modify the database, and the Moodle's database access abstraction layer (DML) is being used correctly according to the Moodle coding guidelines.

Remember, before running this code in a production environment, you should thoroughly test it in a development or staging environment first.
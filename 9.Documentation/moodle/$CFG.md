In Moodle, `$CFG` is a global object that holds configuration data for the site. It is loaded early in the Moodle bootstrapping process and contains values from the `config.php` file, which is the main configuration file for a Moodle site, as well as some additional values that are set by Moodle itself.

Here are some examples of properties that might be accessed from the `$CFG` object:

- `$CFG->wwwroot`: The web address for your Moodle site.
- `$CFG->dataroot`: The file system path where Moodle should store uploaded files.
- `$CFG->dbname`: The name of the database that Moodle should use.
- `$CFG->dbuser`: The username for the database that Moodle should use.
- `$CFG->dbpass`: The password for the database that Moodle should use.
- `$CFG->prefix`: The prefix that Moodle should add to all its database table names.

This is just a small subset of the configuration options that Moodle supports. The `config.php` file contains many more options that can be used to customize the behavior of your Moodle site.

Here's an example of how you might use `$CFG` in a Moodle PHP script:

```php
global $CFG;
require_once($CFG->libdir . '/filelib.php');
```

In this example, we're using `$CFG->libdir` to get the file system path to Moodle's library directory, and then requiring a file from that directory. This is a common pattern in Moodle scripts, since many scripts need to include or require files from various Moodle directories.

config.php
```php
// Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'moodledb';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'root';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_0900_ai_ci',
);

$CFG->wwwroot   = 'http://localhost:8071';
$CFG->dataroot  = '/var/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
```
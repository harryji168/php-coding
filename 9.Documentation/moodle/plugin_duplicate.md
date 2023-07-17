Duplicating and modifying a plugin in Moodle is a similar process to duplicating and modifying a theme. Here's a step-by-step guide:

1. **Duplicate the plugin directory**: Find the directory of the plugin you want to duplicate. Plugins could be located in several places depending on their type (e.g., `mod`, `blocks`, `auth`). For example, if you're duplicating the `choice` plugin from `mod`, you would look for `mod/choice`. Copy this directory and give it a new name. For example, you might name it `mod/mychoice`.

2. **Rename the plugin in `version.php`**: In your new plugin directory, find the `version.php` file. Open it, and change the `$plugin->component` value to match the new name of your plugin. For example:

    ```php
    $plugin->component = 'mod_mychoice';
    ```

    Also update the version number to reflect the current date in `YYYYMMDDXX` format. For example:

    ```php
    $plugin->version = 2023071600;
    ```

3. **Rename language strings**: In your new plugin directory, find the `lang` directory. Inside this directory, you should see another directory for each language your plugin supports (such as `en` for English). Inside each language directory, you'll find a `.php` file with the same name as the original plugin. Rename this file to match the name of your new plugin.

    Inside this file, update the language strings to reflect the new plugin name. For example:

    ```php
    $string['pluginname'] = 'My choice plugin';
    $string['mychoice'] = 'This is my customized choice plugin.';
    ```

    Also, rename any instance of the old plugin name in all files to the new name.

4. **Update the database tables**: If your plugin uses database tables, you need to update the names of these tables to reflect your new plugin name. This would involve renaming the tables and updating any references to these tables in your plugin's code. You should also update the install and upgrade scripts (`db/install.xml` and `db/upgrade.php`) to reflect these changes.

5. **Customize your plugin**: Now you're ready to start customizing your plugin. You can modify the PHP files, CSS, JavaScript, images, and other assets as needed. 

6. **Install your plugin**: To install your plugin, visit the Site administration > Notifications page in your Moodle site. Moodle will automatically detect the new plugin and install it.

Remember, always back up your Moodle site before making significant changes, and test all changes thoroughly before deploying them to a live site. Also, keep in mind that if your plugin depends on other plugins or core Moodle functionality, those dependencies will need to be maintained in your new plugin.
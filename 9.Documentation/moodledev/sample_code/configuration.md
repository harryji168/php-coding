**Question:** 

You are developing a custom plugin for Moodle and need to access the global configuration settings within your code. How do you do this in PHP?

**Options:**

1. `$CONFIG = get_global_config();`
2. `$CFG = global::config();`
3. `global $CFG;`
4. `$config = new MoodleConfig();`

**Answer:**

3. `global $CFG;`

**Explanation:**

In Moodle, the `$CFG` global object is used to access configuration settings. By declaring `global $CFG;` in your PHP file, you make the configuration settings accessible within that file's scope. The other options listed don't correspond to the correct way of accessing global configuration in Moodle.